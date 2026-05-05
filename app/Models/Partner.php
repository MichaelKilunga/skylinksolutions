<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'description',
        'activity',
        'logo_path',
        'is_active',
    ];

    public function getLogoUrlAttribute()
    {
        if (!$this->logo_path) {
            return asset('images/placeholder.jpg');
        }

        if (str_starts_with($this->logo_path, 'images/')) {
            return asset($this->logo_path);
        }

        return \Storage::disk('public')->url($this->logo_path);
    }
}
