<?php

namespace App\Models;

use App\Models\Seller;
use App\Models\Categore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function categores(){
        return$this->hasMany(Categore::class);
    }
    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
