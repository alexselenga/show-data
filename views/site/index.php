<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ArrayDataProvider */
/* @var $categories[] */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'attribute' => 'category',
            'filter' => $categories,
        ],
        'price',
        [
            'attribute' => 'hidden',
            'value' => function ($data) {
                return $data['hidden'] ? 'Скрыто' : 'Открыто';
            },
            'filter' => ['0' => 'Открыто', '1' => 'Скрыто'],
        ],
    ],
]);

echo Yii::$app->formatter->asPhone('89093331122');