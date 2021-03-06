<?php

namespace app\models;

use SebastianBergmann\Comparator\Book;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $second_name
 * @property string|null $last_name
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['last_name'],'string', 'min'=>3],
            [['first_name', 'second_name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'second_name' => 'Отчество',
            'last_name' => 'Фамилия',
        ];
    }
    public function getFullName(){
        return $this->first_name . ' ' . $this->second_name .' ' . $this->last_name;
    }
    public static function getList()
    {
        $models = static::find()->orderBy('last_name')->all();

        return ArrayHelper::map($models, 'id', 'FullName');
    }
}
