<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seller */

$this->title = 'Изменить фамилию продавца: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Фамилии продавцов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="seller-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
