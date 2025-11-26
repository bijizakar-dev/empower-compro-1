<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContactRequests extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],

            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],

            'service_id' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'   => true,
                'null'       => true,
            ],

            'message' => [
                'type' => 'TEXT',
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
        $this->forge->addForeignKey('service_id', 'services', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('contact_requests');
    }

    public function down()
    {
        $this->forge->dropTable('contact_requests');
    }
}