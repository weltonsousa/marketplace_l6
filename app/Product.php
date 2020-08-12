<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function photos()
    {
        return $this->hasMany('App\ProductPhoto');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
