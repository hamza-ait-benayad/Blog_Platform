<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $data = [];
        $userIds = range(1, 10);  
        $categoryIds = range(1, 5); 

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title'      => $faker->sentence(),
                'content'    => $faker->paragraph(3),
                'image_path' => '',
                'user_id'    => $userIds[array_rand($userIds)],  
                'category_id' => $categoryIds[array_rand($categoryIds)], 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('blogs')->insertBatch($data);
    }
}
