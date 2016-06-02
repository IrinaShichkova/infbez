<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = 'Добавить продажу';
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
