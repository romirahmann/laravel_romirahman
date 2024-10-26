<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       \App\Models\Hospital::create([
        'hospital_name' => 'RS Karawang',
        'address' => 'Kota Karawang',
        'email' => 'rsk@gmail.com',
        'phone' => '1234567890',
    ]);

        \App\Models\Hospital::create([
        'patient_name' => 'RS Bogor',
        'address' => 'Kota Bogor',
        'email' => 'rsb@gmail.com',
        'phone' => '0987654321',
    ]);
    }
}
