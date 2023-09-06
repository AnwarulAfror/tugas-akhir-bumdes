<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'pekerjaan' => 'Admin BUMDes',
            'alamat' => 'Ellak Daya Lentang Sumenep',
            'no_telpon' => '+62 852-0453-0003',
        ]);
        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => bcrypt('12345'),
            'pekerjaan' => 'Bendahara BUMDes',
            'alamat' => 'Ellak Daya Lentang Sumenep',
            'no_telpon' => '+62 852-0453-2990',
        ]); 
        User::create([
            'name' => 'Syafiq',
            'email' => 'syafiq@gmail.com',
            'password' => bcrypt('syafiq'),
            'pekerjaan' => 'Web Desainer',
            'alamat' => 'Ellak Daya Lentang Sumenep',
            'no_telpon' => '+62 852-0453-0772',
        ]);
    }
}