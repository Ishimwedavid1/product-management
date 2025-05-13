<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productoutmodel extends Model
{
    protected $table="productout";
    protected $fillable=[
        'product_id',
        'quantity',
        'date',
    ];

    public function product()
{
    return $this->belongsTo(productmodel::class, 'product_id');
}

    use HasFactory;
}
