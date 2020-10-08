<?php

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
     <td>  <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-grad']) ?></td>
    </table>
    </p>

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

                'filter'=> true,
                'contentOptions'=>[
                    'style'=>'text:ntext; white-space: normal;'],
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    //При нажатии на строку переходит во вью книги по ID книги в этой строке
//
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
