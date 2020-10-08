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


    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'editableAuthors')->dropDownList(\app\models\Authors::getList(), ['multiple' => true]) ?>



    <div class="form-group"><table>
      <td>  <?= Html::submitButton('Save', ['class' => 'btn btn-grad']) ?></td>
        </table>
    </div>

    <?php ActiveForm::end(); ?>

</div>
