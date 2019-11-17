<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;
use Exception;
use yii\db\Query;

class SiteMap
{

    /** @var string */
    public $folder;

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
     * @param HasSiteMapLink $link
     * @return array
     */
    public function build(Query $query, HasSiteMapLink $link): array
    {
        $mapFilenames = [];

        $sitemapFile = new SiteMapFile($this->folder);
        $sitemapFile->lock();

        foreach ($query->batch() as $records) {
            foreach ($records as $record) {
                try {
                    $link->record = $record;
                    $sitemapFile->write($link);
                } catch (SiteMapFileExceptionMaxRows|SiteMapFileExceptionMaxSize $e) {
                    $sitemapFile->unlock();
                    $mapFilenames[] = $sitemapFile->getFilename();

                    SiteMapFile::issueUp();

                    $sitemapFile = new SiteMapFile($this->folder);
                    $sitemapFile->lock();
                    $link->record = $record;
                    $sitemapFile->write($link);
                }
            }
        }
        $sitemapFile->unlock();
        $mapFilenames[] = $sitemapFile->getFilename();
        SiteMapFile::issueUp();
        return $mapFilenames;
    }

    /**
     * @throws Exception
     */
    public function checkFolder()
    {
        if (file_exists($this->folder) && is_dir($this->folder) && is_writable($this->folder)) {
//            echo "Folder: $this->folder exists and writable.\n";
        } else {
            throw new Exception("Folder: $this->folder isn't exists or not writable.\n");
        }
    }
}
