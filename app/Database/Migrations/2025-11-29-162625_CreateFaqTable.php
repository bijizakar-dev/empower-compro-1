<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFaqTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'question' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            'answer' => [
                'type' => 'TEXT',
            ],

            'sort_order' => [
                'type'       => 'INT',
                'default'    => 0,
            ],

            'is_active' => [
                'type'       => 'BOOLEAN',
                'default'    => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('faqs');
    }

    public function down()
    {
        $this->forge->dropTable('faqs');
    }
}