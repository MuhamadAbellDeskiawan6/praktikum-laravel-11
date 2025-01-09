<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    // Add this to allow mass assignment on specific fields
    protected $fillable = ['name', 'description'];
}
