<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;
use yii\db\ActiveRecord;

class SiteMapFile extends \SplFileObject
{
    const NEWLINE_SEPARATOR = "\n";
    const MAX_ROWS = 50000;
    const MAX_SIZE = 50 * 1024 * 1024;

    /** @var int */
    private static $issue = 1;

    /** @var string */
    public $filename;

    /** @var string */
    public $filenameMask = 'sitemap{{issue}}.txt';

    /** @var int */
    public $recordCount = 0;

    /**
     * SiteMapFile constructor.
     * @param string $folder
     */
    public function __construct(string $folder)
    {
        $filename = "$folder/$this->filenameMask";
        $filename = str_replace('{{issue}}', self::$issue, $filename);
        parent::__construct($filename, 'w');
    }

    /**
     * @param HasSiteMapLink $link
     * @return int|null
     */
    public function write(HasSiteMapLink $link): ?int
    {
        if (self::MAX_ROWS == $this->recordCount) {
            throw new SiteMapFileExceptionMaxRows;
        }

        $row = $link->sitemapLink() . self::NEWLINE_SEPARATOR;

        if (self::MAX_SIZE < $this->getSize() + strlen($row)) {
            throw new SiteMapFileExceptionMaxSize;
        }

        $this->recordCount++;
        return parent::fwrite($row);
    }

    /**
     * @return bool
     */
    public function lock()
    {
        return parent::flock(LOCK_EX);
    }

    /**
     * @return bool
     */
    public function unlock()
    {
        return parent::flock(LOCK_UN);
    }

    /**
     *
     */
    public static function issueUp()
    {
        self::$issue++;
    }
}
