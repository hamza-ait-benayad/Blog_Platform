<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'       => 'First Blog Post',
                'content'     => 'Content of the first blog post',
                'user_id'     => 1, // Assuming user with ID 1 exists
                'category_id' => 1, // Technology
            ],
            [
                'title'       => 'Healthy Living Tips',
                'content'     => 'Content of the health blog post',
                'user_id'     => 2, // Assuming user with ID 2 exists
                'category_id' => 4, // Health
            ],
            // Add more sample blogs if needed
        ];

        foreach ($data as $blog) {
            $this->db->table('blogs')->insert($blog);
        }
    }
}
