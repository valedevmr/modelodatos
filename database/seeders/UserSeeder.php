<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear 2 administradores
        // Limpiar la tabla antes de insertar


        // // Crear administradores con emails únicos
        // Users::factory()->create([
        //     'full_name' => 'Admin Principal',
        //     'email' => 'admin1@example.com',
        //     'role' => 'admin',
        //     'password' => bcrypt('admin123')
        // ]);

        // Users::factory()->create([
        //     'full_name' => 'Admin Secundario',
        //     'email' => 'admin2@example.com',
        //     'role' => 'admin',
        //     'password' => bcrypt('admin456')
        // ]);

        // Crear 8 usuarios normales con emails aleatorios
        Users::factory()->count(8)->create();
    }
}
