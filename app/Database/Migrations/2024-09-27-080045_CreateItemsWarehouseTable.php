<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItemsWarehouseTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true,
                'null'              => false
            ],
            'id_item' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => false
            ],
            'id_supplier' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'null'              => false
            ],
            'stock' => [
                'type'              => 'DOUBLE',
                'null'              => false,
                'default'           => 0
            ],
            'stock_minimum' => [
                'type'              => 'DOUBLE',
                'null'              => false,
                'default'           => 0
            ],
            'active' => [
                'type'              => 'INT',
                'default'           => 1
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp', 
            'deleted_at' => [
                'type'              => 'datetime',
                'null'              => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_item', 'items', 'id', 'cascade');
        $this->forge->addForeignKey('id_supplier', 'suppliers', 'id', 'cascade');
        $this->forge->createTable('items_warehouse');
    }

    public function down()
    {
        $this->forge->dropForeignKey('items', 'items_warehouse_id_item_foreign');
        $this->forge->dropForeignKey('suppliers', 'items_warehouse_id_supplier_foreign');
        $this->forge->dropTable('items_warehouse');
    }
}
