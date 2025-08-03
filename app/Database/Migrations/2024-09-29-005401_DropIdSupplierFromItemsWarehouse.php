<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropIdSupplierFromItemsWarehouse extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('items_warehouse', 'items_warehouse_id_supplier_foreign');
        $this->forge->dropColumn('items_warehouse', 'id_supplier');
    }

    public function down()
    {
        $this->forge->addColumn('items_warehouse', [
            'id_supplier' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => false
            ],
        ]);
        $this->forge->addForeignKey('id_supplier', 'suppliers', 'id', 'cascade');
        
    }
}
