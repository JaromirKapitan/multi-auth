<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebPage extends Model
{
    use SoftDeletes, HasFactory, Seoble;

    protected $fillable = ['title', 'text_short', 'text', 'status', 'language_id', 'parent_id'];

//    protected static function booted()
//    {
//        static::addGlobalScope('parents', function (Builder $builder) {
//            $builder->whereNull('parent_id');
//        });
//    }

    public function scopeParents(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function childrens()
    {
        return $this->hasMany(WebPage::class, 'parent_id');
    }

    public function getMutationsAttribute()
    {
        $mutations = [config('app.locale') => $this];
        foreach(Language::all() as $language){
            if($language->code == config('app.locale')) continue;
            $mutations[$language->code] = self::where('language_id', $language->id)->where('parent_id', $this->id)->first();
        }

        return $mutations;
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
