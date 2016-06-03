<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Technology;
use app\models\Period;

/* @var $this yii\web\View */
/* @var $model app\models\Seed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seed-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adaptation')->checkbox() ?>

    <?= $form->field($model, 'frost')->checkbox() ?>

    <?= $form->field($model, 'technology_id')->dropDownList([''=>'']+ArrayHelper::map(Technology::find()->orderBy('description')->all(), 'id', 'description')) ?>

    <?= $form->field($model, 'period_id')->dropDownList([''=>'']+ArrayHelper::map(Period::find()->orderBy('time')->all(), 'id', 'time')) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
