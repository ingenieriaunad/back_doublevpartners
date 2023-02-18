<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TickectsSeeder extends Seeder
{
    public function run()
    {
        //generar datos de prueba
        $data = [
            [
                'id' => 1,
                'userId' => 1,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 2,
                'userId' => 1,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 3,
                'userId' => 1,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 4,
                'userId' => 1,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 5,
                'userId' => 4,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 6,
                'userId' => 1,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 7,
                'userId' => 1,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 8,
                'userId' => 2,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 9,
                'userId' => 3,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 10,
                'userId' => 3,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 11,
                'userId' => 2,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
            [
                'id' => 12,
                'userId' => 4,
                'status' => 'open',
                'created_at' => '2021-02-17 23:43:54',
                'updated_at' => '2021-02-17 23:43:54',
                'deleted_at' => null
            ],
        ];
        // Using Query Builder
        $this->db->table('tickets')->insertBatch($data);
    }
}
