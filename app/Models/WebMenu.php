<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebMenu extends Model
{
    protected $table = 'web_menu';
    protected $fillable = ['parent_id', 'target_id', 'target_type', 'link', 'title_langs', 'order'];
    protected $casts = [
        'title_langs' => 'array',
    ];

    public function childrens()
    {
        return $this->hasMany(WebMenu::class, 'parent_id');
    }

    public function target()
    {
        return $this->morphTo();
    }

    public function getTitleAttribute()
    {
        if($this->target)
            return $this->target->title;

        $titleArray = [];
        foreach($this->title_langs as $lang => $title){
            $titleArray[] = $lang . ': ' . $title;
        }
        return implode(', ', $titleArray);
    }
}
