<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230211_091733_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'login' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'uid' => $this->string()->notNull()->unique(),
        ]);

        $this->insert('{{%users}}', [
            'name' => 'Ваня',
            'login' => 'Vanya',
            'email' => 'vanya@test.ru',
            'uid' => substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 32),
        ]);

        $this->insert('{{%users}}', [
            'name' => 'Петя',
            'login' => 'Petya',
            'email' => 'petya@test.ru',
            'uid' => substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 32),
        ]);

        $this->insert('{{%users}}', [
            'name' => 'Джон',
            'login' => 'John',
            'email' => 'john@test.ru',
            'uid' => substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 32),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%users}}', ['login' => 'John']);
        $this->delete('{{%users}}', ['login' => 'Petya']);
        $this->delete('{{%users}}', ['login' => 'Vanya']);

        $this->dropTable('{{%users}}');
    }
}
