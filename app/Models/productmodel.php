<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorymodel;

class productmodel extends Model
{
    protected $table='product';
    protected $fillable=[
        'name',
        'quantity',
        'price',
        'category_id',
    ];
public function category()
{
    return $this->belongsTo(categorymodel::class, 'category_id');
}

public function productouts()
{
    return $this->hasMany(productoutmodel::class, 'product_id');
}
 
    use HasFactory;
}

