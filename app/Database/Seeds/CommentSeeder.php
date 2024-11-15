<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'comment'   => 'Great article!',
                'user_id'   => 13, // Assuming user with ID 1 exists
                'blog_id'   => 5, // Commenting on the first blog
            ],
            [
                'comment'   => 'Very informative, thanks!',
                'user_id'   => 2, // Assuming user with ID 2 exists
                'blog_id'   => 6,
            ],
            [
                'comment'   => 'GG',
                'user_id'   => 1, // Assuming user with ID 1 exists
                'blog_id'   => 5, // Commenting on the first blog
            ],
            [
                'comment'   => 'Goooooooooooooooooood!',
                'user_id'   => 13, // Assuming user with ID 2 exists
                'blog_id'   => 6,
            ],
            // Add more comments if needed
        ];

        foreach ($data as $comment) {
            $this->db->table('comments')->insert($comment);
        }
    }
}
