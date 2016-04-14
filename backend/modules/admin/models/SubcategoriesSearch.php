<?php

namespace backend\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\admin\models\Subcategories;

/**
 * SubcategoriesSearch represents the model behind the search form about `app\modules\admin\models\Subcategories`.
 */
class SubcategoriesSearch extends Subcategories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subcategories_id', 'categories_category_id'], 'integer'],
            [['subcategories_name', 'date', 'active'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Subcategories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'subcategories_id' => $this->subcategories_id,
            'categories_category_id' => $this->categories_category_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'subcategories_name', $this->subcategories_name])
                ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
