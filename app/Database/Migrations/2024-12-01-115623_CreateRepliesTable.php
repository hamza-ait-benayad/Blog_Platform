<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRepliesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'comment_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'blog_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'content' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('comment_id', 'comments', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('blog_id', 'blogs', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('replies');
    }

    public function down()
    {
        $this->forge->dropTable('replies');
    }
}