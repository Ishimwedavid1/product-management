<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productmodel;

class categorymodel extends Model
{
    protected $table="category";
    protected $fillable=[
        'category_name',
    ];
    
    public function products(){
        return $this->hasMany(productmodel::class,'category_id');
    }
    use HasFactory;
}
