<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewSortSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сорта для тестирования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-sort-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новый сорт для тестирования', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'date:date',
            [
                'attribute' => 'date',
                'value' => function($model) {return date('d.m.Y',$model->date);}
            ],
            'comment:ntext',
           // 'seed_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
