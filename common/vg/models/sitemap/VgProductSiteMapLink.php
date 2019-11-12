<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;
use common\vg\models\VgProduct;

class VgProductSiteMapLink implements HasSiteMapLink
{
    /** @var VgProduct */
    public $product;

    /** @var string */
    public $server;

    /**
     * VgProductSiteMapLink constructor.
     * @param VgProduct $product
     * @param string $server
     */
    public function __construct(VgProduct $product, string $server)
    {
        $this->product = $product;
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function sitemapLink(): string
    {
        return "$this->server/product/{$this->product->id}";
    }
}
