<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Period */

$this->title = 'Изменить срок созревания: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сроки созревания', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="period-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
