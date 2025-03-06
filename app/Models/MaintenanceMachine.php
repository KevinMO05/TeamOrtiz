<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceMachine extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_code_id',
        'last_maintenance_date',
        'next_maintenance',
    ];

    public function machineCode()
    {
        return $this->belongsTo(MachineCode::class, 'machine_code_id');
    }
}