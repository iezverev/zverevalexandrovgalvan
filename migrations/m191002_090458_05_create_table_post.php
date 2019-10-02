<?php

use yii\db\Migration;

class m191002_090458_05_create_table_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('author_id', '{{%post}}', 'author_id');
        $this->addForeignKey('post_ibfk_1', '{{%post}}', 'author_id', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
