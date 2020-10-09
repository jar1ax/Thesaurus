<?php

use app\models\Booklist;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Authors */

$this->title =$model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="authors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><table>
                    <td> <?= Html::button('Обновить', ['value'=>Url::to('index.php?r=authors/update' . '&id=' . $model->id),
                            'class' => 'btn btn-grad','id'=>'modalUpdateButton']) ?></td>
        <!--            Для ЧПУ -->
<!--        <td> --><?//= Html::button('Обновить', ['value'=>Url::to('update' . '?id=' . $model->id),
//                'class' => 'btn btn-grad','id'=>'modalUpdateButton']) ?><!--</td>-->
        <?php
        Modal::begin([
            'header'=>'<h4>Обновить</h4>',
            'id'=>'modal_update',
            'size'=>'modal-lg',
        ]);
        echo "<div id='modalUpdate'></div>";
        Modal::end();
        ?>
        <td>  <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-grad',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></td>
    </table>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'second_name',
            'last_name',
        ],
    ]) ?>

</div>
