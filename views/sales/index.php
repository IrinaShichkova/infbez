<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить продажу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

  //          'id',
            'buy_data:date',
            'sum',
            [
                'attribute' => 'cash',
                'value' => function($model) {return $model->cash == 1 ? 'Да' : 'Нет';}
            ],
            'seller.name',
            'client.company',
            'part.number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
