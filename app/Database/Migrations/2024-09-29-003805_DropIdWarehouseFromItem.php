<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropIdWarehouseFromItem extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('items', 'items_id_warehouse_foreign');
        $this->forge->dropColumn('items', 'id_warehouse');
    }

    public function down()
    {
        $this->forge->addColumn('items', [
            'id_warehouse' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => true,
            ]
        ]);
        $this->forge->addForeignKey('id_warehouse', 'warehouses', 'id', 'cascade');
        
    }
}
