<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'id_rol' => 0,
            'tipo_documento' => 'CC',
            'documento' => '1234567890',
            'nombres' => 'Administrador',
            'papellido' => '',
            'sapellido' => '',
            'edad' => 18,
            'genero' => 'M',
            'email' => 'admin@correo.com',
            'password' => Hash::make('admin1234'), // Encriptada
        ]);
    }
}
