<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'status'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
