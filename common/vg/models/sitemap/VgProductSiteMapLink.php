<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;
use yii\db\ActiveRecord;

class VgProductSiteMapLink implements HasSiteMapLink
{
    /** @var string */
    public string $serverName;

    /** @var ActiveRecord */
    public ActiveRecord $record;

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
