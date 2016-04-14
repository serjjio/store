<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $category_id
 * @property string $category_name
 *
 * @property Subcategories[] $subcategories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategories()
    {
        return $this->hasMany(Subcategories::className(), ['categories_category_id' => 'category_id']);
    }
}
