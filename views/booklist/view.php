<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Booklist */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Booklists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="booklist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><table><tr>
    <td>  <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-grad']) ?></td>
      <td> <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-grad',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></td>
           <td> <?= Html::button('Загрузить изображение', ['value'=>Url::to('index.php?r=booklist/set-image' . '&id=' . $model->id),
            'class' => 'btn btn-grad','id'=>'modalUploadButton']) ?></td>
        </tr>
    </table>
    <?php
        Modal::begin([
            'header'=>'<h4>Загрузить изображение</h4>',
            'id'=>'modal_upload',
            'size'=>'modal-sm',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
     ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
//        'showHeader'=>false,
//        'label'=>'false',
        'attributes' => [
            [
                'attribute'=>'image',
                'format' => 'html',
                'label'=>false,
                'showHeader'=>false,
                'header' => 'Изображение',
//                'style'=>'color:red',
//                'htmlOptions'=>['font-color:red'],
                'value'=> function($data){
                    return Html::img($data->getImage(),['width' => 200,'height'=>'']);
                }
            ],
            'id',
            'name',
//            'image',
            'description:ntext',
//            'author_id',
            'date',
            [
                'attribute'=>'author_id',
                'format'=>'raw',
//                'value'=>'fullName'
                //Что бы работали ссылки нужно сначала включить URLManager в конфиге  что бы включить ЧПУ
                'value' => function ($model) {
                    //Для ЧПУ
//                    return Html::a(Html::encode($model->fullName),'/authors/view'.'?id='.$model->author_id);
                    //Без ЧПУ
                    return Html::a(Html::encode($model->fullName),'index.php?r=authors/view'.'&id='.$model->author_id);
                },
            ],
//
//            [
//                    'attribute'=>'fullName',
//                    'format'=>'html',
//                    'label'=>'Author(Ссылка из виджета)',
//                    'value'=> Html::a($model->getFullName(),['/authors/view','id'=>$model->author_id]),
//                    //Html::a('kek',['authors/view','id'=>$model->author_id],['class' => 'btn btn-primary']),
//
//            ]
        ],
    ]) ?>

</div>
