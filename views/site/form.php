<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Кодер';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->dropDownList([
        '' => '',
        'caesar' => 'Шифр Цезаря (кодировать)',
        'caesar_decode' => 'Шифр Цезаря (декодировать)',
        'vigener' => 'Виженер (кодировать)',
        'vigener_decode' => 'Виженер (декодировать)'
    ]);

    ?>

    <?= $form->field($model, 'code')->textInput() ?>

    <?= $form->field($model, 'dataFile')->fileInput() ?>


    <? if(!empty($model->outFileUrl)): ?>

        <?= Html::a("Файл результата", $model->outFileUrl) ?>

    <? endif; ?>



    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Перекодировать', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
