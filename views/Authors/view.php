<?php

use app\models\Booklist;
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
      <td> <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-grad']) ?></td>
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
//        'dataProvider' => $dataProvider,
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'second_name',
            'last_name',
//            [
//                    'attribute'=>'book_id',
//                    'label'=>'Книги',
//                    'format'=>'raw',
//                    'content'=>function($model){
//                    return $model->getBooks();
//                    }
//            ],

        ],
    ]) ?>

</div>
