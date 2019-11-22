<?php

namespace common\vg\manager;

use common\models\YmlFile;
use common\vg\helpers\ImportHelper;
use common\vg\models\import\Folder;
use common\vg\models\import\FolderCreateException;
use Yii;

class ImportManager
{
    /**
     * @param int $companyId
     * @param string $url
     * @return string
     * @throws FolderCreateException
     * @throws \Throwable
     */
    public function createLocalFile(int $companyId, string $url): string
    {
        $ymlFile = new YmlFile;
        $ymlFile->company = $companyId;
        $ymlFile->url = $url;
        $ymlFile->size = ImportHelper::getFileSize($url);
        $ymlFile->checked = false;
        $ymlFile->created_at = (new \DateTime)->format('Y-m-d H:i:s');
        $ymlFile->insert(false);

        $ymlFolder = new Folder(Yii::$app->params['import']['folder']);
        $filename  = $ymlFolder->getLocalNameForFileId($ymlFile->id);
        $ymlFile->local_filename = $filename;
        $ymlFile->save(false);

        return $filename;
    }
}