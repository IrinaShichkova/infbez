<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seed */

$this->title = 'Изменить сорт: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сорта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="seed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
