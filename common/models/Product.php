<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string|null $except
 * @property string $description
 * @property string|null $image
 * @property string|null $gallery_ids
 * @property int|null $count
 * @property int|null $cost
 * @property int|null $old_cost
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Category $category
 * @property Category $category0
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'count', 'cost', 'old_cost', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 32],
            [['except', 'image', 'gallery_ids'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'except' => 'Except',
            'description' => 'Description',
            'image' => 'Image',
            'gallery_ids' => 'Gallery Ids',
            'count' => 'Count',
            'cost' => 'Cost',
            'old_cost' => 'Old Cost',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
//    public function getCategory()
//    {
//        return $this->hasOne(Category::class, ['id' => 'category_id']);
//    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
