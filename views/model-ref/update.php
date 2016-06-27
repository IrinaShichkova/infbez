<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModelRef */

$this->title = 'Update Model Ref: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Model Refs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="model-ref-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
