<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebMenu extends Model
{
    protected $table = 'web_menu';

    public function sections()
    {
        return $this->hasMany(WebMenuSection::class);
    }

    public function parent(){
        return $this->belongsTo(WebMenu::class);
    }

    public function children()
    {
        return $this->hasMany(WebMenu::class, 'web_menu_id');
    }

    public function webPage()
    {
        return $this->belongsTo(WebPage::class);
    }
}
