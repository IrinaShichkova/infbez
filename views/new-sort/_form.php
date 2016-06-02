<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\NewSort */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="new-sort-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dateStr')->widget(DatePicker::className(), [
        'language' => 'ru'
    ]) ?>


    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?if(!$model->isNewRecord): ?>
            <?= Html::a('Создать любое слово', ['/seed/to-seed', 'id' => $model->id],['class' => 'btn btn-primary']) ?>
        <?endif;?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
