<?php

namespace common\vg\models\import;

use yii\db\Exception;

class Folder
{
    /** @var string */
    private string $folder = '';

    /**
     * Folder constructor.
     * @param string $folder
     * @throws Exception
     */
    public function __construct(string $folder)
    {
        $this->folder = $folder;
        $this->checkFolder();
    }

    /**
     * @throws Exception
     */
    private function checkFolder(): void
    {
        $f = $this->folder;

        if (!file_exists($f)) {
            if (!mkdir($f)) {
                throw new Exception("Cannot create folder: $f");
            }
            chmod($f, 0755);
        }
    }

    /**
     * @param int $id
     * @return string
     */
    public function getLocalNameForFileId(int $id): string
    {
        return "$this->folder/$id.xml";
    }
}
