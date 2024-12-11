<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('CategorySeeder');
        $this->call('UserSeeder');
        $this->call('BlogSeeder');
        $this->call('CommentSeeder');
        $this->call('ReplySeeder');
    }
}
