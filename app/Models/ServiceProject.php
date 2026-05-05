<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProject extends Model
{
    protected $fillable = ['service_id', 'title', 'category', 'image', 'link'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
