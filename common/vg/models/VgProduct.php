<?php

namespace common\vg\models;
use common\models\Product;
use phpDocumentor\Reflection\Types\This;

class VgProduct extends Product
{
    const NO_PRODUCT = '/img/no_product.jpg';

    public function getPrice()
    {
        return number_format($this->price, 0, '', ' ');
    }
}
