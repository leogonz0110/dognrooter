<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategories extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title'
    ];
    
    public function categoryPerProduct() {
        return $this->hasMany(CategoryPerProduct::class);
    }
}
