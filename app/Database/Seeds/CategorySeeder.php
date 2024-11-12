<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Technology'],
            ['name' => 'Lifestyle'],
            ['name' => 'Education'],
            ['name' => 'Health'],
        ];

        foreach ($data as $category) {
            $this->db->table('categories')->insert($category);
        }
    }
}
