<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Booklist */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="booklist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><table><tr>
            <td> <?= Html::button('Обновить', ['value'=>Url::to('index.php?r=booklist/update' . '&id=' . $model->id),
                    'class' => 'btn btn-grad','id'=>'modalUpdateButton']) ?></td>
<!--            Для ЧПУ -->
<!--            <td> --><?//= Html::button('Обновить', ['value'=>Url::to('update' . '?id=' . $model->id),
//                    'class' => 'btn btn-grad','id'=>'modalUpdateButton']) ?><!--</td>-->
            <?php
            Modal::begin([
                'header'=>'<h4>Обновить</h4>',
                'id'=>'modal_update',
                'size'=>'modal-lg',
            ]);
            echo "<div id='modalUpdate'></div>";
            Modal::end();
            ?>
      <td> <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-grad',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></td>
<!--            Для ЧПУ-->
<!--            <td> --><?//= Html::button('Загрузить изображение', ['value'=>Url::to('set-image' . '?id=' . $model->id),
//                    'class' => 'btn btn-grad','id'=>'modalUploadButton']) ?><!--</td>-->

<!--            Без ЧПУ-->
<!---->
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

        'attributes' => [
            [
                'attribute'=>'image',
                'format' => 'html',
                'label'=>false,
                'showHeader'=>false,
                'header' => 'Изображение',
                'value'=> function($data){
                    return Html::img($data->getImage(),['width' => 200,'height'=>'']);
                }
            ],
            'id',
            'name',
            'description:ntext',
            [
                'attribute'=>'authors',
                'label'=>'Автор(ы)',
                'format'=>'html',

                'filter'=> true,
                'contentOptions'=>[
                    'style'=>'text:ntext; white-space: normal;'
                ],
                'value'=>  function($data) {

                    $str ='';
                    foreach($data['authors'] as $author)
                    {


                        $str.=Html::a(Html::encode( $author['fullName'].' '),'index.php?r=authors/view'.'&id='.$author['id']). '<br/>';

                    }
                    return  $str;
                },
            ],
            'date',

        ],
    ]) ?>

</div>
