<?php

namespace backend\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\admin\models\Catalog;

/**
 * CatalogSearch represents the model behind the search form about `app\modules\admin\models\Catalog`.
 */
class CatalogSearch extends Catalog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_id', 'categories_category_id', 'subcategories_subcategory_id', 'count', 'location'], 'integer'],
            [['name', 'foto', 'doc', 'brend', 'size', 'active'], 'safe'],
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
        $query = Catalog::find();

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
            'catalog_id' => $this->catalog_id,
            'categories_category_id' => $this->categories_category_id,
            'subcategories_subcategory_id' => $this->subcategories_subcategory_id,
            'count' => $this->count,
            'location' => $this->location,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'doc', $this->doc])
            ->andFilterWhere(['like', 'brend', $this->brend])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'size', $this->size]);

        return $dataProvider;
    }
}
