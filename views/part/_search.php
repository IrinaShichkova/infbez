<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="part-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'end') ?>

    <?= $form->field($model, 'yes') ?>

    <?= $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'batch_time') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'batch_id') ?>

    <?php // echo $form->field($model, 'seed_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
