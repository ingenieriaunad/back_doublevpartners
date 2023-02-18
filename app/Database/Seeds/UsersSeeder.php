<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        //generar datos de prueba
        $data = [
            [
                'id' => 1,
                'name' => 'Juan',
                'email' => 'juan@juan.com',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 2,
                'name' => 'Pedro',
                'email' => 'pedro@pedro.com',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 3,
                'name' => 'Maria',
                'email' => 'maria@maria.com',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 4,
                'name' => 'Luis',
                'email' => 'luis@luis.com',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],

        ];
        //insertar datos de prueba
        $this->db->table('users')->insertBatch($data);
        
    }
}
