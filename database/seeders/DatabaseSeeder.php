<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Resepsionis',
                'email' => 'resepsionis@gmail.com',
                'role' => 'resepsionis',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Triuji',
                'email' => 'tri@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345678'),

            ],

        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }

        $hotel = [
            [
                'nama_hotel' => 'Hotel',
                'alamat' => 'Alamat Hotel',
                'no_telp' => 'No Telpon Hotel',
                'email' => 'hotel@email.com',
            ]
        ];
        foreach($hotel as $key => $value){
            Hotel::create($value);
        }


    }
}
