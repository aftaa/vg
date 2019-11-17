<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;
use yii\db\ActiveRecord;

class VgCompanySiteMapLink implements HasSiteMapLink
{
    /** @var string */
    public $serverName;

    /** @var ActiveRecord */
    public $record;

    /**
     * VgCompanySiteMapLink constructor.
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
        return "$this->serverName/company/{$this->record->id}";
    }
}
