<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterServiceEnglish extends Migration
{
    public function up()
    {
        // Tambah kolom logo_dark dan logo_white
        $this->forge->addColumn('services', [
            'lang' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => false,
                'default'    => 'id',
                'after'      => 'id', // letakkan setelah kolom apa pun
            ],
        ]);
    }

    public function down()
    {
        // Hapus kolom baru jika rollback
        $this->forge->dropColumn('services', ['lang']);
    }
}
