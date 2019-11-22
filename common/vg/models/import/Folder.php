<?php

namespace common\vg\models\import;

class Folder
{
    /** @var string */
    private $folder = '';

    /**
     * Folder constructor.
     * @param string $folder
     * @throws FolderCreateException
     */
    public function __construct(string $folder)
    {
        $this->folder = $folder;
        $this->checkFolder();
    }

    /**
     * @throws FolderCreateException
     */
    private function checkFolder()
    {
        $f = $this->folder;

        if (!file_exists($f)) {
            if (!mkdir($f)) {
                throw new FolderCreateException("Cannot create folder: $f");
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
        $filename = "$this->folder/$id.xml";
        return $filename;
    }
}