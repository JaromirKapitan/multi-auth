<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebMenuSection extends Model
{
    use SoftDeletes;

    const MAIN = 1;

    protected $table = 'web_menu_section';
}
