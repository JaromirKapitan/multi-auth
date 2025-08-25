<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoData extends Model
{
    public static $rules = [
        'seo.title' => 'required|string|max:255',
        'seo.slug' => 'required|string|max:255|unique:seo_data,slug',
        'seo.description' => 'nullable|string|max:300',
    ];

    protected $table = 'seo_data';
    protected $fillable = ['seoble_id', 'seoble_type', 'slug', 'title', 'description', 'keywords', 'canonical_url', 'robots'];
}
