<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'banner_image',
        'short_description',
        'description',
        'status',
        'order'
    ];

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function features()
    {
        return $this->hasMany(ServiceFeature::class);
    }

    public function projects()
    {
        return $this->hasMany(ServiceProject::class);
    }
}
