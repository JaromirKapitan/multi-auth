<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebMenu extends Model
{
    protected $table = 'web_menu';
    protected $fillable = ['parent_id', 'target_id', 'target_type', 'link', 'title_langs', 'order'];
}
