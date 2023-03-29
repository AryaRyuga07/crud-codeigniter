<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Risotto',
                'jenis'    => 'Makanan',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Rice Bowl',
                'jenis'    => 'Makanan',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Sushi',
                'jenis'    => 'Makanan',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO menu (nama, jenis, created_at, updated_at) VALUES(:nama:, :jenis:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        $this->db->table('menu')->insertBatch($data);
    }
}