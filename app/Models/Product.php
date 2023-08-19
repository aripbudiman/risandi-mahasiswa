<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function jenis(){
        return $this->belongsTo(Jenis::class);
    }

    public function keranjang(){
        return $this->belongsTo(Keranjang::class,);
    }

    public function orderdetails(){
        return $this->hasMany(Order_details::class);
    }
}
