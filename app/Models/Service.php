<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = ['title', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($service) {
            if ($service->isDirty('title')) {
                $slug = Str::slug($service->title);
                $originalSlug = $slug;
                $count = 1;

                while (static::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }

                $service->slug = $slug;
            }
        });
    }
}