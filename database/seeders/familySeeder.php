<?php

namespace Database\Seeders;

use App\Models\family;
use Illuminate\Database\Seeder;

class familySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        family::create([
            'name' => 'Budi',
            'jenis_kelamin' => 'L'
        ]);

        family::create([
            'name' => 'Dedi',
            'id_parent' => 1,
            'jenis_kelamin' => 'L'
        ]);

        family::create([
            'name' => 'Dodi',
            'id_parent' => 1,
            'jenis_kelamin' => 'L'
        ]);

        family::create([
            'name' => 'Dede',
            'id_parent' => 1,
            'jenis_kelamin' => 'L'
        ]);

        family::create([
            'name' => 'Dewi',
            'id_parent' => 1,
            'jenis_kelamin' => 'P'
        ]);

        family::create([
            'name' => 'Feri',
            'id_parent' => 2,
            'jenis_kelamin' => 'L'
        ]);

        family::create([
            'name' => 'Farah',
            'id_parent' => 2,
            'jenis_kelamin' => 'P'
        ]);

        family::create([
            'name' => 'Gugus',
            'id_parent' => 3,
            'jenis_kelamin' => 'L'
        ]);

        family::create([
            'name' => 'Gandi',
            'id_parent' => 3,
            'jenis_kelamin' => 'L'
        ]);

        family::create([
            'name' => 'Hani',
            'id_parent' => 4,
            'jenis_kelamin' => 'P'
        ]);

        family::create([
            'name' => 'Hana',
            'id_parent' => 4,
            'jenis_kelamin' => 'P'
        ]);
    }
}
