<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'sub_category_id',
        'name',
        'slug',
        'small_description',
        'image',
        'high_heading',
        'high_description',
        'description_heading',
        'description',
        'detail_heading',
        'detail',
        'sale_tag',
        'original_price',
        'offer_price',
        'quantity',
        'priority',
        'new_arrival',
        'featured_product',
        'popular_product',
        'offer_product',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'weight'
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
}
