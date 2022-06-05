<?php

namespace App\Models;

use App\Models\City;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    use HasFactory , HasRoles;
    public function city(){
        return $this->belongsTo(City::class);
    }
}
