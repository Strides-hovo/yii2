<?php

use yii\db\Migration;

/**
 * Class m210725_122416_create_category
 */
class m210725_122416_create_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(0),
            'name' => $this->string(32)->notNull()->unique(),
            'except' => $this->string(255),
            'description' => $this->text(),
            'image' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

//        $this->createIndex(
//            'idx-category_product',
//            'product',
//            'id'
//        );
//
//        // add foreign key for table `category`
//        $this->addForeignKey(
//            'fk-post-category_id',
//            'category',
//            'id',
//            'product',
//            'category_id',
//            'CASCADE'
//        );

    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-product-category_id',
            'category'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-category_product',
            'category'
        );
        $this->dropTable('{{%category}}');
    }
}
