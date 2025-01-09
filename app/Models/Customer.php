<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     use HasFactory;

    // Add only the fields you want to be mass assignable
    protected $fillable = [
        'nik', 
        'name', 
        'telp', 
        'email', 
        'alamat'
    ];
}
