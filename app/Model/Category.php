<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['group_id', 'name', 'description', 'image', 'icon', 'status'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
