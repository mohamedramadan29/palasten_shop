<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function SubCategories()
    {
        return $this->belongsTo(SubCategory::class,'id');
    }
}
