<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Part */

$this->title = 'Добавить партию';
$this->params['breadcrumbs'][] = ['label' => 'Партии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
