<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = 'Изменить продажу: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="sales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
