<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewSort */

$this->title = 'Добавить новый сорт для тестирования';
$this->params['breadcrumbs'][] = ['label' => 'Сорта для тестирования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-sort-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
