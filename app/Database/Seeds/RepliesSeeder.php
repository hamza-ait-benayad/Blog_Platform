<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Faker;

class RepliesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $userIds = range(1, 10);  
        $commentIds = range(1, 50); 
        $blogIds = range(1, 20);    

        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'comment_id' => $commentIds[array_rand($commentIds)], 
                'blog_id'    => $blogIds[array_rand($blogIds)],     
                'user_id'    => $userIds[array_rand($userIds)],        
                'content'    => $faker->text(200),                     
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('replies')->insertBatch($data);
    }
}
