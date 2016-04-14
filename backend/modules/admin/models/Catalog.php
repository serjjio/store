<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $catalog_id
 * @property integer $categories_category_id
 * @property integer $subcategories_subcategory_id
 * @property string $name
 * @property string $foto
 * @property string $doc
 * @property string $brend
 * @property string $size
 * @property integer $count
 * @property integer $location
 *
 * @property Subcategories $subcategoriesSubcategory
 * @property Categories $categoriesCategory
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categories_category_id', 'subcategories_subcategory_id', 'name', 'doc', 'brend', 'size', 'count', 'location', 'active'], 'required'],
            [['categories_category_id', 'subcategories_subcategory_id', 'count', 'location', 'active'], 'integer'],
            [['name', 'foto', 'doc', 'brend', 'size'], 'string', 'max' => 200],
            ['file', 'file', 'extensions' => ['png', 'jpg']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'catalog_id' => 'Catalog ID',
            'categories_category_id' => 'Categories Category ID',
            'subcategories_subcategory_id' => 'Subcategories Subcategory ID',
            'name' => 'Name',
            'foto' => 'Foto',
            'doc' => 'Doc',
            'brend' => 'Brend',
            'size' => 'Size',
            'count' => 'Count',
            'location' => 'Location',
            'active' => 'Active/Inactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategoriesSubcategory()
    {
        return $this->hasOne(Subcategories::className(), ['subcategories_id' => 'subcategories_subcategory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'categories_category_id']);
    }
}
