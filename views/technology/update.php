<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Technology */

$this->title = 'Изменить способ посадки: ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Способы посадки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->description]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="technology-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
