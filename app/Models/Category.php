<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'parent_category_id' ];

    public function subcategory()
    {
        return $this->hasMany(\App\Models\Category::class, 'parent_category_id')->whereNull('deleted_at');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parent_category_id');
    }
}
