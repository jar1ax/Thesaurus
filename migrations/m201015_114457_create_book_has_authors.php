<?php

use yii\db\Migration;


/**
 * Handles the creation of table `{{%book_has_authors}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%book}}`
 * - `{{%authors}}`
 */

class m201015_114457_create_book_has_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_has_authors}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'authors_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-book_has_authors-book_id}}',
            '{{%book_has_authors}}',
            'book_id'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-book_has_authors-book_id}}',
            '{{%book_has_authors}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );

        // creates index for column `authors_id`
        $this->createIndex(
            '{{%idx-book_has_authors-authors_id}}',
            '{{%book_has_authors}}',
            'authors_id'
        );

        // add foreign key for table `{{%authors}}`
        $this->addForeignKey(
            '{{%fk-book_has_authors-authors_id}}',
            '{{%book_has_authors}}',
            'authors_id',
            '{{%authors}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%book}}`
        $this->dropForeignKey(
            '{{%fk-book_has_authors-book_id}}',
            '{{%book_has_authors}}'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-book_has_authors-book_id}}',
            '{{%book_has_authors}}'
        );

        // drops foreign key for table `{{%authors}}`
        $this->dropForeignKey(
            '{{%fk-book_has_authors-authors_id}}',
            '{{%book_has_authors}}'
        );

        // drops index for column `authors_id`
        $this->dropIndex(
            '{{%idx-book_has_authors-authors_id}}',
            '{{%book_has_authors}}'
        );

        $this->dropTable('{{%book_has_authors}}');
    }
}
