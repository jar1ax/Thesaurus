<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * BooklistSearch represents the model behind the search form of `app\models\Booklist`.
 */
class BooklistSearch extends Booklist
{
    /**
     * {@inheritdoc}
     */
    public $last_name;

    public $authors;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'image', 'description', 'date','last_name','authors'], 'safe'],
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
        $query = Booklist::find()->distinct()->InnerJoinWith('authors');
//        ->orderBy(['authors.last_name'=>SORT_ASC]);



        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'attributes'=>[
                    'name',
                    'authors' => [
                            'asc' => ['authors.last_name' => SORT_ASC],
                            'desc' => ['authors.last_name' => SORT_DESC],
                            'default' => SORT_ASC
                    ],
                ],
                'defaultOrder'=>[
                    'name'=>SORT_ASC,
                ]
        ]]);

        if (!($this->load($params)&& $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like','authors.last_name',$this->authors]);


        return $dataProvider;
    }
}
