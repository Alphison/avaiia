<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'birth_day',
        'order_count',
        'phone',
        'remember_token'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function addresses() {
        return $this->hasMany(Address::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function isAdmin(){

        return $this->is_admin === 1;
    }


}
