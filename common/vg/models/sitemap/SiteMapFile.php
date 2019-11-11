<?php

namespace common\vg\models\sitemap;

class SiteMapFile extends \SplFileObject
{
    const NEWLINE_SEPARATOR = "\n";

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
     */
    public function __construct()
    {
        parent::__construct($this->getFilename(), 'w');
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        if (!$this->filename) {
            $filename = $this->filenameMask;
            $filename = str_replace('{{issue}}', self::$issue, $filename);
            $this->filename = $filename;
        }
        return $this->filename;
    }

    /**
     * @param $url
     * @return int
     */
    public function write($url): int
    {
        $this->recordCount++;
        return parent::fwrite($url . self::NEWLINE_SEPARATOR);
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
