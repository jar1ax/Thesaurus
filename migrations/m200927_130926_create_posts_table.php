<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%authors}}`
 * - `{{%book}}`
 */
class m200927_130926_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-posts-author_id}}',
            '{{%posts}}',
            'author_id'
        );

        // add foreign key for table `{{%authors}}`
        $this->addForeignKey(
            '{{%fk-posts-author_id}}',
            '{{%posts}}',
            'author_id',
            '{{%authors}}',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-posts-book_id}}',
            '{{%posts}}',
            'book_id'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-posts-book_id}}',
            '{{%posts}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%authors}}`
        $this->dropForeignKey(
            '{{%fk-posts-author_id}}',
            '{{%posts}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-posts-author_id}}',
            '{{%posts}}'
        );

        // drops foreign key for table `{{%book}}`
        $this->dropForeignKey(
            '{{%fk-posts-book_id}}',
            '{{%posts}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-posts-book_id}}',
            '{{%posts}}'
        );

        $this->dropTable('{{%posts}}');
    }
}
