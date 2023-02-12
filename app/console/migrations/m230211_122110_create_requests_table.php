<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%requests}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%users}}`
 */
class m230211_122110_create_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%requests}}', [
            'id' => $this->primaryKey(),
            'from_id' => $this->integer()->notNull(),
            'to_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        // creates index for column `from_id`
        $this->createIndex(
            '{{%idx-requests-from_id}}',
            '{{%requests}}',
            'from_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-requests-from_id}}',
            '{{%requests}}',
            'from_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `to_id`
        $this->createIndex(
            '{{%idx-requests-to_id}}',
            '{{%requests}}',
            'to_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-requests-to_id}}',
            '{{%requests}}',
            'to_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        $this->insert('{{%requests}}', [
            'from_id' => '3',
            'to_id' => '1',
            'text' => 'Привет из Калифорнии!'
        ]);

        $this->insert('{{%requests}}', [
            'from_id' => '2',
            'to_id' => '3',
            'text' => 'Привет из Москвы!'
        ]);

        $this->insert('{{%requests}}', [
            'from_id' => '1',
            'to_id' => '1',
            'text' => 'Письмо себе.'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%requests}}', ['id' => 3]);
        $this->delete('{{%requests}}', ['id' => 2]);
        $this->delete('{{%requests}}', ['id' => 1]);

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-requests-from_id}}',
            '{{%requests}}'
        );

        // drops index for column `from_id`
        $this->dropIndex(
            '{{%idx-requests-from_id}}',
            '{{%requests}}'
        );

        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-requests-to_id}}',
            '{{%requests}}'
        );

        // drops index for column `to_id`
        $this->dropIndex(
            '{{%idx-requests-to_id}}',
            '{{%requests}}'
        );

        $this->dropTable('{{%requests}}');
    }
}
