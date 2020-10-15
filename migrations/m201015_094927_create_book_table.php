<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m201015_094927_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
            'description' => $this->text(),
            'date' => $this->date()->defaultValue(new \yii\db\Expression('NOW()')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
