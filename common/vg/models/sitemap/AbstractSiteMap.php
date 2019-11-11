<?php

namespace common\vg\models\sitemap;

use Exception;
use yii\db\Query;

class AbstractSiteMap
{
    const MAX_ROWS = 50;
    const MAX_SIZE = 50 * 1024 * 1024;

    /** @var string */
    public $folder;

    /** @var Query */
    public $query;

    /** @var string */
    public $filenameMask = 'sitemap{{i}}.txt';

    /**
     * AbstractSiteMap constructor.
     * @param string $folder
     * @param Query $query
     * @param string|null $filenameMask
     */
    public function __construct(string $folder, Query $query, ?string $filenameMask)
    {
        $this->folder = $folder;
        $this->query = $query;
        if (null !== $filenameMask) {
            $this->filenameMask = $filenameMask;
        }
    }

    public function create()
    {
        foreach ($this->query->batch() as $rows) {
            foreach ($rows as $row) {

            }
        }
    }

    /**
     * @throws Exception
     */
    public function checkFolder()
    {
        if (file_exists($this->folder) && is_dir($this->folder) && is_writable($this->folder)) {
            echo "Folder: $this->folder exists and writable.\n";
        }
        throw new Exception("Folder: $this->folder isn't exists or not writable.\n");
    }
}
