<?php

namespace common\vg\manager;

use common\models\YmlCategory;
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
     * @return YmlFile
     * @throws FolderCreateException
     * @throws \Throwable
     */
    public function createLocalFile(int $companyId, string $url): YmlFile
    {
        $ymlFile = new YmlFile;
        $ymlFile->company_id = $companyId;
        $ymlFile->url = $url;
        $ymlFile->size = ImportHelper::getFileSize($url);
        $ymlFile->checked = false;
        $ymlFile->created_at = (new \DateTime)->format('Y-m-d H:i:s');
        $ymlFile->updated_at = (new \DateTime)->format('Y-m-d H:i:s');
        $ymlFile->local_filename = '';
        $ymlFile->insert(false);

        $ymlFolder = new Folder(Yii::$app->params['import']['folder']);
        $filename = $ymlFolder->getLocalNameForFileId($ymlFile->id);
        $ymlFile->local_filename = $filename;
        $ymlFile->save(false);

        if (!copy($url, $filename)) {
            throw new Exception("cannot copy remote file to local: $filename");
        }

        $xml = simplexml_load_file($filename);
        foreach ($xml->shop->categories->children() as $category) {
            $ymlCategory = new YmlCategory;
            $ymlCategory->name = $category;
            $ymlCategory->yml_file_id = $ymlFile->id;
        }

        return $ymlFile;
    }
}
