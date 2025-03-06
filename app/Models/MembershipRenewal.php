<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipRenewal extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'renewal_date',
        'previous_end_date',
        'new_end_date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}