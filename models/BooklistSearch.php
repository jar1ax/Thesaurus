<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booklist;
use app\models\AuthorsSearch;
use yii\debug\models\search\Debug;

/**
 * BooklistSearch represents the model behind the search form of `app\models\Booklist`.
 */
class BooklistSearch extends Booklist
{
    /**
     * {@inheritdoc}
     */
    public $fullName;
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['name', 'image', 'description', 'date'], 'safe'],
            [['fullName'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Booklist::find();
//        $query->joinWith('author_id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'attributes'=>[
                    'name',
                    'author_id',
                ],
                'defaultOrder'=>['name'=>SORT_ASC]
        ]]);

        if (!($this->load($params)&& $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith['authors'];
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
