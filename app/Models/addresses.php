<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'address',
        'mail',
        'city',
        'town',
        'tel',
        'user_id',
        'session_id',
    ];

     protected $table = 'addresses';
}
