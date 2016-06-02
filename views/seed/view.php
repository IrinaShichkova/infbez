<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seed */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сорта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seed-view">

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
            'id',
            'name',
            'year',
            'adaptation',
            'frost',
            'technology_id',
            'period_id',
            'description',
            [
                'format' => 'raw',
                'label' => 'Изобаржение',
                'value' => Html::img($model->imageUrl)
            ]
        ],
    ]) ?>

</div>
