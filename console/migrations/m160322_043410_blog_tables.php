<?php

use common\components\Migration;

class m160322_043410_blog_tables extends Migration
{
    public $prefix = 'blog_';

    public function safeUp()
    {
        $this->createTable('{{%'.$this->prefix.'category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'alias' => $this->string(100)->unique(),
            'description' => $this->string(),
        ]);

        $this->createTable('{{%'.$this->prefix.'post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'anons' => $this->text()->notNull(),
            'content' => 'MEDIUMTEXT NULL',
            'author_id' => $this->integer()->defaultValue(NULL),
            'category_id' => $this->integer()->defaultValue(NULL),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%'.$this->prefix.'tags}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->unique(),
        ]);

        $this->createTable('{{%'.$this->prefix.'post_tags}}', [
            'tag_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            ''.$this->prefix.'fk-post-category_id-category-id',
            '{{%'.$this->prefix.'post}}',
            'category_id',
            '{{%'.$this->prefix.'category}}',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            ''.$this->prefix.'fk-post-author_id-user-id',
            '{{%'.$this->prefix.'post}}',
            'author_id',
            '{{%user}}',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            ''.$this->prefix.'fk-post_tags-tag_id-tags-id',
            '{{%'.$this->prefix.'post_tags}}',
            'tag_id',
            '{{%'.$this->prefix.'tags}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            ''.$this->prefix.'fk-post_tags-post_id-post-id',
            '{{%'.$this->prefix.'post_tags}}',
            'post_id',
            '{{%'.$this->prefix.'post}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%'.$this->prefix.'post_tags}}');
        $this->dropTable('{{%'.$this->prefix.'tags}}');
        $this->dropTable('{{%'.$this->prefix.'post}}');
        $this->dropTable('{{%'.$this->prefix.'category}}');
    }
}
