<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = $model->book_name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Обновить', ['value'=>Url::to('index.php?r=books/update'. '&id='. $model->id),
            'class' => 'btn btn-primary','id'=>'modalUpdateButton']) ?>
        <?php
        Modal::begin([
            'header'=>'<h4>Обновить информацию</h4>',
            'id'=>'modal_update',
            'size'=>'modal-lg',
        ]);
        echo "<div id='modalUpdate'></div>";
        Modal::end();
        ?>
        <?= Html::button('Загрузить изображение', ['value'=>Url::to('index.php?r=books/set-image' . '&id=' . $model->id),
            'class' => 'btn btn-default','id'=>'modalUploadButton']) ?>
        <?php
        Modal::begin([
            'header'=>'<h4>Загрузить изображение</h4>',
            'id'=>'modal_upload',
            'size'=>'modal-sm',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
        ?>

        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            'book_name',
            'author',
            [
                'format' => 'html',
                'label' => 'Изображение',
                'value'=> function($data){
                    return Html::img($data->getImage(),['width' => 200,'height'=>'']);
                }
            ],
            'image',
            'description',
           // 'author_id',
            'date',
        ],
    ]) ?>


</div>
