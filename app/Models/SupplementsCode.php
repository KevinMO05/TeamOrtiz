<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplementsCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplements_id',
        'code',
        'purchase_date',
        'expiration_date',
        'state',
    ];

    public function supplement()
    {
        return $this->belongsTo(Supplement::class, 'supplements_id');
    }
}