<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seed */

$this->title = 'Добавить сорт';
$this->params['breadcrumbs'][] = ['label' => 'Сорта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
