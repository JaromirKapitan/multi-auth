<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes, HasFactory, Seoble;

    protected $fillable = ['title', 'text_short', 'text', 'status'];

    public function webPages()
    {
        return $this->belongsToMany(WebPage::class);
    }
}
