<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoData extends Model
{
    protected $table = 'seo_data';
    protected $fillable = ['seoble_id', 'seoble_type', 'lang', 'slug', 'title', 'description', 'keywords', 'canonical_url', 'robots'];
}
