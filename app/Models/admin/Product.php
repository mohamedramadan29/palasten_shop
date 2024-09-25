<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function variations()
    {
        return $this->hasMany(ProductVartions::class);
    }
    public function Main_Category()
    {
        return $this->belongsTo(MainCategory::class,'category_id');
    }
    public function Sub_Category()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function gallary()
    {
        return $this->hasMany(ProductGallary::class,'product_id');
    }
}
