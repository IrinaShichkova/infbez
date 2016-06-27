<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModelRef */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="model-ref-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model_id')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
