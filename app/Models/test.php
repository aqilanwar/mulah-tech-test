<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    protected $fillable = [
        'index',
        'value'
    ];

    use HasFactory;
}
