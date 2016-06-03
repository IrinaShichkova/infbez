<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Batch;
use app\models\Seed;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Part */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="part-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end')->textInput() ?>

    <?= $form->field($model, 'yes')->checkbox() ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batch_time')->widget(DatePicker::className(), [
        'language' => 'ru'
    ]) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'batch_id')->dropDownList([''=>'']+ArrayHelper::map(Batch::find()->orderBy('name')->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'seed_id')->dropDownList([''=>'']+ArrayHelper::map(Seed::find()->orderBy('id')->all(), 'id', 'id')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
