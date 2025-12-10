<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterSettingLogo extends Migration
{
    public function up()
    {
         // Tambah kolom logo_dark dan logo_white
        $this->forge->addColumn('settings', [
            'logo_dark' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'site_name', // letakkan setelah kolom apa pun
            ],
            'logo_light' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'logo_dark',
            ],
        ]);

        // Hapus kolom lama "logo"
        $this->forge->dropColumn('settings', 'logo');
    }

    public function down()
    {
        // Tambah kembali kolom logo
        $this->forge->addColumn('settings', [
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'site_name',
            ],
        ]);

        // Hapus kolom baru jika rollback
        $this->forge->dropColumn('settings', ['logo_dark', 'logo_light']);
    }
}
