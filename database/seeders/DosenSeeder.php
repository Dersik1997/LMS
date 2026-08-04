<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::updateOrCreate(
            ['nidn' => '12345678'], // Kondisi pencarian: Cek apakah NIDN ini sudah ada
            [
                'nama' => 'Elgar Ahmadal',
                'email' => 'elgar@ummi.ac.id',
                'password' => Hash::make('12345678'),
                'no_hp' => '081234567890',
                'homebase' => 'Teknik Informatika',
            ]
        );
    }
}