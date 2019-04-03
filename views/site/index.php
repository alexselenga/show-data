<?php

use yii\grid\GridView;
use app\components\TestHelper;

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

echo '<br><br>';
echo 'created_at -> '.TestHelper::underscore2camel('created_at');
echo '<br>';
echo TestHelper::ru2en('Купи слона');
echo '<br>';
echo TestHelper::truncateString("Lorem\n ipsum   dolor  \v sit amet, consectetur adipiscing elit,"
    .' sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
    .' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
