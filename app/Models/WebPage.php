<?php

namespace App\Models;

use App\Enums\Lang;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebPage extends Model
{
    use SoftDeletes, HasFactory, Seoble;

    protected $fillable = ['title', 'description', 'text', 'status', 'lang', 'parent_id'];

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
        foreach(Lang::values() as $lang){
            if($lang == config('app.locale')) continue;
            $mutations[$lang] = self::where('lang', $lang)->where('parent_id', $this->id)->first();
        }

        return $mutations;
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
