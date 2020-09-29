<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\bootstrap\Modal;
use yii\helpers\Url;
$this->title = 'Thesaurus CRUD ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Добавить книгу', ['value'=>Url::to('index.php?r=books/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <?php
        Modal::begin([
                  'header'=>'<h4>Редактирование книг и авторов</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
        ]);
    echo "<div id='modalContent'></div>";
        Modal::end();
    ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyCell'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'format' => 'html',
                'label' => 'Изображение',
                'value'=> function($data){
                    return Html::img($data->getImage(),['width' => 200,'height'=>'']);
                }
            ],
            'book_name' ,
            'author',
            'description',
            'date',

           // 'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
