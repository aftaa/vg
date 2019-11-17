<?php

namespace common\vg\models\sitemap;

use DateTime;
use DOMDocument;
use DOMNode;

class SiteMapMain
{
    /** @var DOMDocument */
    private $xml;

    /** @var DOMNode */
    private $sitemapindex;

    /**
     * SiteMapMain constructor.
     */
    public function __construct()
    {
        $this->xml = new DOMDocument('1.0', 'UTF-8');
        $sitemapindex = $this->xml->createElement('sitemapindex');
        $this->sitemapindex = $this->xml->appendChild($sitemapindex);
        $sitemapindex->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
    }

    /**
     * @param string $loc
     * @param DateTime $lastmod
     */
    public function addSitemap(string $loc, DateTime $lastmod)
    {
        $sitemap = $this->sitemapindex->appendChild($this->xml->createElement('sitemap'));
        $domLoc = $this->xml->createElement('loc', $loc);
        $domLastmod = $this->xml->createElement('lastmod', $lastmod->format('c'));

        $sitemap->appendChild($domLoc);
        $sitemap->appendChild($domLastmod);
    }

    /**
     * @param string $filename
     * @return bool
     */
    public function save(string $filename): bool
    {
        $xml = $this->xml->saveXML();
        return file_put_contents($filename, $xml);
    }
}
