<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Usuario::factory()->create([
            'nombres' => 'Admin',
            'email' => 'admin@sis258.com',
            'rol' => 'admin',
        ]);
        Usuario::factory()->create([
            'nombres' => 'Usuario',
            'email' => 'usuario@sis258.com',
            'rol' => 'usuario',
        ]);
    }
}
