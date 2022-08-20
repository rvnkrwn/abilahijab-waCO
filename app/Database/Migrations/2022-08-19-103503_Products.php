<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   =>  [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'productid' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'img' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'name'  => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'total' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'create_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'update_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('productid');
        $this->forge->addUniqueKey('name');
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
