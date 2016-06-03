<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Part */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Партии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'number',
            'end',
            [
                'label' => 'Оплата наличными',
                'value' => $model->yes == 1 ? 'Да' : 'Нет'
            ],
            'amount',
            'batch_time:datetime',
            'weight',
            'batch.name',
            'seed.name',
        ],
    ]) ?>

</div>
