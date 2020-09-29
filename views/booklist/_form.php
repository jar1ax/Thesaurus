<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Booklist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booklist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'authors.first_name')->textInput() ?>


<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <div class="form-group"><table>
      <td>  <?= Html::submitButton('Save', ['class' => 'btn btn-grad']) ?></td>
        </table>
    </div>

    <?php ActiveForm::end(); ?>

</div>
