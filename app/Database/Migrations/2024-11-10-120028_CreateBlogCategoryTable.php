<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogCategoryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'blog_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'category_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addForeignKey('blog_id', 'blogs', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('blog_category');
    }

    public function down()
    {
        $this->forge->dropTable('blog_category');
    }
}
