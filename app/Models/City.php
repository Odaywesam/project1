<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Seller;
use App\Models\Employee;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    public function admins(){
        return$this->hasMany(Admin::class);
    }
    public function employees(){
        return$this->hasMany(Employee::class);
    }
    public function merchants(){
        return$this->hasMany(Merchant::class);
    }
    public function sellers(){
        return$this->hasMany(Seller::class);
    }

}
