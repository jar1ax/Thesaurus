<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\models\Booklist;
use yii\helpers\Url;
use app\models\BooklistSearch;
//use app\models\Authors;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooklistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Booklist */
$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
//Пагинация
$searchModel = new \app\models\BooklistSearch();

$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->pagination->pageSize=15;
?>
<div class="booklist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><table>
     <td>  <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-grad']) ?></td>
    </table>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'   => function ($model) {
        return ['data-id' => $model->id,
                'author-id'=>$model->author_id,
                ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            ['attribute'=>'posts.book_id',
//                'format'=>'raw',
//                'value'=>'posts.',
//                'label'=>'Авторыкек'
//            ],
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
//            'image',
           // 'description:ntext',
            [
                'attribute'=>'description',
                'label'=>'Описание',
                'filter'=>false,
                'contentOptions'=>[
                        'style'=>'text:ntext; white-space: normal;',
                ],

            ],

//            'authors_id',
//            [
//                'attribute'=>'authors.first_name',
//                'format'=>'raw',
//                'label'=>'Автор',
//            ],
            [
                'attribute'=>'author_id',
                'format'=>'raw',
                'label'=>'Автор',
//                'value'=>'fullName'
                //Что бы работали ссылки нужно сначала включить URLManager в конфиге  что бы включить ЧПУ
                'value' => function ($model) {
                    //Для ЧПУ
//                    return Html::a(Html::encode($model->fullName),'/authors/view'.'?id='.$model->author_id);
                    //Без ЧПУ
                    return Html::a(Html::encode($model->fullName),'index.php?r=authors/view'.'&id='.$model->author_id);
                },
            ],

            [
                   'attribute'=>'date',
                'filter'=>false,
                'contentOptions' => ['style' => 'width:100px; white-space: normal;'],

            ],

//            [
//
//                    'attribute'=>'fullName',
//                    'format'=>'raw',
//                    'label'=>'Author(Ссылка из виджета)',
//                     //Что бы работали ссылки нужно сначала включить URLManager в конфиге  что бы включить ЧПУ
//                    'value' => function ($model) {
//                    //Для ЧПУ
////                    return Html::a(Html::encode($model->fullName),'/authors/view'.'?id='.$model->author_id);
//                    //Без ЧПУ
//                    return Html::a(Html::encode($model->fullName),'index.php?r=authors/view'.'&id='.$model->author_id);
//                    },
//
//
//                    //Html::a('kek',['authors/view','id'=>$model->author_id],['class' => 'btn btn-primary']),
//
//            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    //При нажатии на строку переходит во вью книги по ID книги в этой строке

//    $this->registerJs("
//
//    $('td').click(function (e) {
//        var id = $(this).closest('tr').data('id');
//        if(e.target == this)
//            location.href = '" . Url::to(['booklist/view']) . "?id=' + id;
//
//    });
//
//");
    ?>



</div>
