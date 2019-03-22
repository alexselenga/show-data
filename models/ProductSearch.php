<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;

class ProductSearch extends Model
{
    public $id;
    public $categoryId;
    public $price;
    public $hidden;
    public $category;

    public static function parseXmlData($fileName) {
        $el = simplexml_load_file(Yii::$app->basePath."/web/$fileName");
        $json  = json_encode($el);
        return json_decode($json, true)['item'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'price', 'hidden'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Категория',
            'price' => 'Стоимость',
            'hidden' => 'Доступность',
        ];
    }

    /**
     * Creates data provider instance
     *
     * @param array $products
     * @param array $params
     *
     * @return ArrayDataProvider
     */
    public function search($products, $params)
    {
        $this->load($params);
        $this->validate();

        $products = array_filter($products, function($product) {
            if (is_numeric($this->id) && $this->id != $product['id'])
                return false;

            if (is_numeric($this->category) && $this->category != $product['categoryId'])
                return false;

            if (is_numeric($this->price) && $this->price != $product['price'])
                return false;

            if (is_numeric($this->hidden) && $this->hidden != $product['hidden'])
                return false;


            return true;
        });

        $dataProvider = new ArrayDataProvider([
            'allModels' => $products,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'category', 'price', 'hidden'],
            ],
        ]);

        return $dataProvider;
    }
}
