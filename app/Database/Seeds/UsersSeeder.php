<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use App\Models\UserModel;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Manually insert a few sample users
        $data = [
            [
                'username'     => 'Admin User',
                'email'    => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
            ],
            [
                'username'     => 'Regular User',
                'email'    => 'user@example.com',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
            ]
        ];

        // Insert the users into the database
        $this->db->table('users')->insertBatch($data);

        // Optionally, use a fabricator to create more random users (requires Fabricator)
        $userModel = new UserModel();
        $fabricator = new Fabricator($userModel);
        
        // Generate and insert 10 random users
        for ($i = 0; $i < 10; $i++) {
            $fabricatedUser = $fabricator->make();
            $userModel->insert($fabricatedUser);
        }
    }
}
