<?php

use yii\db\Migration;

class m191002_090458_08_create_table_token extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%token}}', [
            'user_id' => $this->integer()->notNull(),
            'code' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'type' => $this->smallInteger()->notNull(),
        ], $tableOptions);

        $this->createIndex('token_unique', '{{%token}}', ['user_id', 'code', 'type'], true);
        $this->addForeignKey('fk_user_token', '{{%token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%token}}');
    }
}
