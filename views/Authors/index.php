<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\AuthorsSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
$searchModel = new \app\models\AuthorsSearch();

$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->pagination->pageSize=15;
?>
<div class="authors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <table>
        <!--        Без ЧПУ-->

                <td> <?= Html::button('Добавить автора', ['value'=>Url::to('index.php?r=authors/create'),
                        'class' => 'btn btn-grad','id'=>'modalButton']) ?></td>

        <!--        Для ЧПУ-->

<!--        <td> --><?//= Html::button('Добавить автора', ['value'=>Url::to('authors/create'),
//                'class' => 'btn btn-grad','id'=>'modalButton']) ?><!--</td>-->
    </table>
    </p>
    <?php
    Modal::begin([
        'header'=>'<h4>Добавить книгу</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    </table>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'   => function ($model) {
            return ['data-id' => $model->id,
            ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            [
                    'attribute'=>'second_name',
                    'label'=>'Отчество',
                    'filter'=>false,
            ],
            'last_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


 <?   $this->registerJs("

    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
            location.href = '" . Url::to(['authors/view']) . "&id=' + id;

    });

");?>


</div>
