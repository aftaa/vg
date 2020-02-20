<?php

namespace common\vg\models\import;

use common\vg\interfaces\HasSiteMapLink;
use common\vg\models\VgProduct;
use yii\db\ActiveRecord;

class VgProductSiteMapLink implements HasSiteMapLink
{
    /** @var string */
    public $serverName;

    /** @var ActiveRecord */
    public $record;

    /**
     * VgProductSiteMapLink constructor.
     * @param string $serverName
     */
    public function __construct(string $serverName)
    {
        $this->serverName = $serverName;
    }

    /**
     * @return string
     */
    public function sitemapLink(): string
    {
        return "$this->serverName/product/{$this->record->id}";
    }
}
