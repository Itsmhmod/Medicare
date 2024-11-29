<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prescriptions()
    {
        return $this->belongstomany(Prescription::class, 'prescription_treatment');
    }
}
