<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Moving */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="moving-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'plus')->textInput() ?>

    <?= $form->field($model, 'minus')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
