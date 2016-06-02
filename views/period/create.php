<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Period */

$this->title = 'Добавить срок созревания';
$this->params['breadcrumbs'][] = ['label' => 'Сроки созревания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="period-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
