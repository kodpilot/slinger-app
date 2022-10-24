<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $table = 'users';
    

    public function getCarts()
    {
        return $this->hasMany('App\Models\carts', 'userID', 'id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\orders');
    }
}
