<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Seller;
use app\models\Client;
use app\models\Part;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dateStr')->widget(DatePicker::className(), [
        'language' => 'ru'
    ]) ?>


    <?= $form->field($model, 'sum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cash')->checkbox() ?>

    <?= $form->field($model, 'seller_id')->dropDownList([''=>'']+ArrayHelper::map(Seller::find()->orderBy('name')->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'client_id')->dropDownList([''=>'']+ArrayHelper::map(Client::find()->orderBy('company')->all(), 'id', 'company')) ?>

    <?= $form->field($model, 'part_id')->dropDownList([''=>'']+ArrayHelper::map(Part::find()->orderBy('number')->all(), 'id', 'number')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
