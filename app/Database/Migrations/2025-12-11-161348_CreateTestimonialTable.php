<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestimonialTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'            => 'BIGINT',
                'constraint'      => 20,
                'unsigned'        => true,
                'auto_increment'  => true,
            ],

            'author_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],

            'author_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],

            'author_company' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],

            'rating' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 5,
            ],

            'message' => [
                'type' => 'TEXT',
                'null' => false,
            ],

            'photo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Foto testimoni (path)',
            ],

            'sort_order' => [
                'type'    => 'INT',
                'default' => 0,
            ],

            'is_active' => [
                'type'    => 'BOOLEAN',
                'default' => true,
            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('testimonials');
    }

    public function down()
    {
        $this->forge->dropTable('testimonials');
    }
}
