<?php

use yii\db\Migration;

/**
 * Class m210725_121517_create_product
 */
class m210725_123217_create_product extends Migration
{





    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->defaultValue(0),
            'name' => $this->string(32)->notNull(),
            'except' => $this->string(255),
            'description' => $this->text()->notNull(),
            'image' => $this->string(),
            'gallery_ids' => $this->string(),
            'count' => $this->integer()->defaultValue(1),
            'cost' => $this->integer()->defaultValue(0),
            'old_cost' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);



        $this->createIndex(
            'idx-post-category_id',
            'product',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-post-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
//         drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-post-category_id',
            'product'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-post-category_id',
            'product'
        );

        $this->dropTable('{{%product}}');
    }

}
