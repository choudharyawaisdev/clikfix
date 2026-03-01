<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'service_id', 
        'price', 
        'description', 
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}