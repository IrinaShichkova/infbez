<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Technology;
use app\models\Period;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SeedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сорта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seed-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить сорт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'year',
            [
                'attribute' => 'adaptation',
                'value' => function($model) {return $model->adaptation == 1 ? 'Да' : 'Нет';}
            ],
            [
                'attribute' => 'frost',
                'value' => function($model) {return $model->frost == 1 ? 'Да' : 'Нет';}
            ],
            [
                'label' => 'Способ посадки',
                'attribute' => 'technology_id',
                'value' => function($model) {return $model->technology->description;},
                'filter' => Html::activeDropDownList($searchModel, 'technology_id', ArrayHelper::map(Technology::find()->asArray()->all(), 'id', 'description'),['class'=>'form-control','prompt' => 'Укажите способ']),
            ],
            [
                'label' => 'Срок созревания',
                'attribute' => 'period_id',
                'value' => function($model) {return $model->period->time;},
                'filter' => Html::activeDropDownList($searchModel, 'period_id', ArrayHelper::map(Period::find()->asArray()->all(), 'id', 'time'),['class'=>'form-control','prompt' => 'Укажите срок']),
            ],
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
