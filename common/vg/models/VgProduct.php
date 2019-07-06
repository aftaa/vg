<?php

namespace common\vg\models;
use common\models\Product;
use phpDocumentor\Reflection\Types\This;

class VgProduct extends Product
{
    public function getPrice()
    {
        return number_format($this->price, 0, '', ' ');
    }
}
