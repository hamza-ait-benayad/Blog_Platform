<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'content'   => 'Great article!',
                'user_id'   => 1, // Assuming user with ID 1 exists
                'blog_id'   => 1, // Commenting on the first blog
            ],
            [
                'content'   => 'Very informative, thanks!',
                'user_id'   => 2, // Assuming user with ID 2 exists
                'blog_id'   => 1,
            ],
            // Add more comments if needed
        ];

        foreach ($data as $comment) {
            $this->db->table('comments')->insert($comment);
        }
    }
}
