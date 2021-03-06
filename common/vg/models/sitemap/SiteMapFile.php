<?php

namespace common\vg\models\sitemap;

use common\vg\interfaces\HasSiteMapLink;

class SiteMapFile extends \SplFileObject
{
    const NEWLINE_SEPARATOR = "\n";
    const MAX_ROWS = 50000;
    const MAX_SIZE = 50 * 1024 * 1024;

    /** @var int */
    private static int $issue = 1;

    /** @var string */
    public string $filename;

    /** @var string */
    public string $filenameMask = 'sitemap{{issue}}.txt';

    /** @var int */
    public int $recordCount = 0;

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

        if ($this->getSize() + strlen($row) > self::MAX_SIZE) {
            throw new SiteMapFileExceptionMaxSize;
        }

        $this->recordCount++;
        return parent::fwrite($row) && parent::fflush();
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
