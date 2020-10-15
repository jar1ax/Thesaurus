<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooklistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Booklist */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;

/**Пагинация
 *
 */
$searchModel = new \app\models\BooklistSearch();

$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->pagination->pageSize=15;
?>
<div class="booklist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><table>
<!--        Без ЧПУ-->

        <td> <?= Html::button('Добавить книгу', ['value'=>Url::to('index.php?r=booklist/create'),
                'class' => 'btn btn-grad','id'=>'modalButton']) ?></td>

<!--        Для ЧПУ-->

<!--        <td> --><?//= Html::button('Добавить книгу', ['value'=>Url::to('booklist/create'),
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

<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'format' => 'html',
                'header' => 'Изображение',
                'value'=> function($data){
                    return Html::img($data->getImage(),['width' => 200,'height'=>'']);
                }
            ],

            [
                'attribute'=>'name',
                'label'=>'Название',
                'contentOptions'=>[
                        'style'=> 'width:150px; white-space: normal;'
                ]
            ],

            [
                'attribute'=>'description',
                'label'=>'Описание',
                'filter'=>false,
                'contentOptions'=>[
                        'style'=>'text:ntext; white-space: normal;',
                ],

            ],

            [
                'attribute'=>'authors',
                'format'=>'html',
                'label'=>'Автор(ы)',
                'filter'=> true,
                'contentOptions'=>[
                    'style'=>'text:ntext; width:150px; white-space: normal;'],
                'value'=>  function($data) {
                    $str ='';
                    foreach($data['authors'] as $author)
                    {

                        $str.=Html::a(Html::encode( $author['fullName'].' '),'index.php?r=authors/view'.'&id='.$author['id']). '<br/>';

                    }
                    return  $str;
                },
            ],



            [
                   'attribute'=>'date',
                'filter'=>false,
                'contentOptions' => ['style' => 'width:100px; white-space: normal;'],

            ],
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {delete}'
                ],
        ],
    ]);




    ?>



</div>
