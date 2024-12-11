<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $userIds = range(1, 10);  
        $blogIds = range(1, 20);  

        $data = [];

        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'blog_id'    => $blogIds[array_rand($blogIds)], 
                'user_id'    => $userIds[array_rand($userIds)], 
                'comment'    => $faker->text(200), 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('comments')->insertBatch($data);
    }
}
