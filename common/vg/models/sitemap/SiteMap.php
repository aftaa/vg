<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;
use Exception;
use yii\db\Query;

class SiteMap
{

    /** @var string */
    public $folder;

    /** @var string */
    public $serverName = 'http://vseti-goroda.ru';

    /**
     * SiteMap constructor.
     * @param string $folder
     * @throws Exception
     */
    public function __construct(string $folder)
    {
        $this->folder = $folder;
        $this->checkFolder();
    }

    /**
     * @param Query $query
     * @param string $linkClassName
     * @return array
     */
    public function build(Query $query, string $linkClassName): array
    {
        $mapFilenames = [];

        $sitemapFile = new SiteMapFile($this->folder);
        $sitemapFile->lock();

        foreach ($query->batch() as $records) {
            foreach ($records as $record) {
                $link = new $linkClassName($record, $this->serverName);
                try {

                    $sitemapFile->write($link);
                } catch (SiteMapFileExceptionMaxRows|SiteMapFileExceptionMaxSize $e) {
                    $sitemapFile->unlock();
                    $mapFilenames[] = $sitemapFile->getFilename();

                    SiteMapFile::issueUp();

                    $sitemapFile = new SiteMapFile($this->folder);
                    $sitemapFile->lock();
                    $sitemapFile->write($link);
                }
            }
        }
        $sitemapFile->unlock();
        return $mapFilenames;
    }

    /**
     * @throws Exception
     */
    public function checkFolder()
    {
        if (file_exists($this->folder) && is_dir($this->folder) && is_writable($this->folder)) {
            echo "Folder: $this->folder exists and writable.\n";
        } else {
            throw new Exception("Folder: $this->folder isn't exists or not writable.\n");
        }
    }
}
