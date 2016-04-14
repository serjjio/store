<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "subcategories".
 *
 * @property integer $subcategories_id
 * @property integer $categories_category_id
 * @property string $subcategories_name
 *
 * @property Categories $categoriesCategory
 */
class Subcategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subcategories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categories_category_id', 'subcategories_name', 'date', 'active'], 'required'],
            [['categories_category_id', 'active'], 'integer'],
            [['subcategories_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subcategories_id' => 'Subcategories ID',
            'active' => 'Active/Inactive',
            'categories_category_id' => 'Category Name',
            'subcategories_name' => 'Subcategories Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'categories_category_id']);
    }
}
