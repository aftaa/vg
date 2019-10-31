<?php

namespace common\vg\models;

use common\models\Product;
use common\vg\interfaces\VgGetMaxId;
use Yii;
use yii\db\Exception;

class VgProduct extends Product implements VgGetMaxId
{
    const NO_PRODUCT = '/img/no_product.jpg';

    /**
     * @return string
     */
    public function getPrice()
    {
        return number_format($this->price, 0, '', ' ');
    }

    /**
     * @return int
     * @throws Exception
     */
    public static function getMaxId(): int
    {
        return (int)Yii::$app->getDb()->createCommand('SELECT MAX(id) FROM product')->queryScalar();
    }
}
