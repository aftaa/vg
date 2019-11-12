<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;
use common\vg\models\VgCompany;

class VgCompanySiteMapLink implements HasSiteMapLink
{
    /** @var VgCompany */
    public $company;

    /** @var string */
    public $server;

    /**
     * VgCompanySiteMapLink constructor.
     * @param VgCompany $company
     * @param string $server
     */
    public function __construct(VgCompany $company, string $server)
    {
        $this->company = $company;
        $this->server = $server;
    }


    /**
     * @param string $serverLink
     * @return string
     */
    public function sitemapLink(): string
    {
        return "$this->server/company/{$this->company->id}";
    }
}
