<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplementBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}