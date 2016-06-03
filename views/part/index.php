<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Seed;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить партию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'number',
            [
                'label' => 'Сорт',
                'attribute' => 'seed_id',
                'value' => function($model) {return $model->seed->name;},
                'filter' => Html::activeDropDownList($searchModel, 'seed_id', ArrayHelper::map(Seed::find()->asArray()->all(), 'id', 'name'),['class'=>'form-control','prompt' => 'Укажите сорт']),
            ],
            'end',
            'yes',
            // 'amount',
            'batch_time:datetime',
            // 'weight',
            // 'batch_id',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
