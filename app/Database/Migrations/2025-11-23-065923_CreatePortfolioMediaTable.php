<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePortfolioMediaTable extends Migration
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
            'portfolio_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'file_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'media_type' => [
                'type'       => 'ENUM',
                'constraint' => ['image', 'video'],
                'default'    => 'image'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('portfolio_id', 'portfolio', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('portfolio_media');
    }

    public function down()
    {
        $this->forge->dropTable('portfolio_media');
    }
}