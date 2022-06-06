<?php

namespace App\Models;

use App\Models\City;
use App\Models\Products;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Seller extends Authenticatable
{
    use HasFactory , HasRoles;
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function products(){
        return $this->hasMany(Products::class);
    }
}
