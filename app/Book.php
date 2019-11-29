<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'images', 'discriptions', 'excerpts', 'pubic_years', 'status'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
