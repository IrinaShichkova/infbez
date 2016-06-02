<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewSort */

$this->title = 'Изменить сорт для тестирования: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сорта для тестирования', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="new-sort-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
