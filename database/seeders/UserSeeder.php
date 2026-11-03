<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin TheVillage',
                'nama_awal' => 'Admin',
                'nama_akhir' => 'TheVillage',
                'email' => 'admin@thevillage.test',
                'role' => 'ADMIN',
            ],
            [
                'name' => 'Warga Satu',
                'nama_awal' => 'Warga',
                'nama_akhir' => 'Satu',
                'email' => 'warga1@thevillage.test',
                'role' => 'USER',
            ],
            [
                'name' => 'Warga Dua',
                'nama_awal' => 'Warga',
                'nama_akhir' => 'Dua',
                'email' => 'warga2@thevillage.test',
                'role' => 'USER',
            ],
            [
                'name' => 'Penyelenggara Satu',
                'nama_awal' => 'Penyelenggara',
                'nama_akhir' => 'Satu',
                'email' => 'penyelenggara1@thevillage.test',
                'role' => 'PENYELENGGARA',
            ],
            [
                'name' => 'Penyelenggara Dua',
                'nama_awal' => 'Penyelenggara',
                'nama_akhir' => 'Dua',
                'email' => 'penyelenggara2@thevillage.test',
                'role' => 'PENYELENGGARA',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'nama_awal' => $user['nama_awal'],
                    'nama_akhir' => $user['nama_akhir'],
                    'password' => Hash::make('password123'),
                    'role' => $user['role'],
                    'no_hp' => '081234567890',
                    'id_desa' => 1,
                    'rt' => '001',
                    'rw' => '002',
                ]
            );
        }
    }
}