<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPortofolioLink extends Migration
{
    public function up()
    {
        $this->forge->addColumn('portfolio', [
            'link_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'thumbnail'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('portfolio', ['link_url']);
    }
}
