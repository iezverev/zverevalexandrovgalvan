<?php

use yii\db\Migration;

class m191002_090458_04_create_table_auth_item_child extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string()->notNull(),
            'child' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%auth_item_child}}', ['parent', 'child']);
        $this->createIndex('child', '{{%auth_item_child}}', 'child');
        $this->addForeignKey('auth_item_child_ibfk_1', '{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name', 'CASCADE', 'CASCADE');
        $this->addForeignKey('auth_item_child_ibfk_2', '{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%auth_item_child}}');
    }
}
