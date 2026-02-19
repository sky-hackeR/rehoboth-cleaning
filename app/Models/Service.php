<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'content',
        'meta_title',
        'base_price', 
        'image_path',
        'is_active'
    ];

    /**
     * A service can have many quotes generated for it.
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
