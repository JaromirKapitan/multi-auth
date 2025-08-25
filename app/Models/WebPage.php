<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebPage extends Model
{
    use SoftDeletes, HasFactory, Seoble;

    protected $fillable = ['title', 'text_short', 'text', 'status'];

}
