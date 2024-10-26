<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'patient_name',
        'address',
        'phone',
        'hospital_id'
    ];

     public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}
