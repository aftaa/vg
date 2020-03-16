<?php

namespace common\vg\manager;

use common\models\YmlCategory;
use common\models\YmlFile;
use common\models\YmlOffer;
use common\vg\helpers\ImportHelper;
use common\vg\models\import\Folder;
use Exception;
use SimpleXMLElement;
use Yii;

class ImportManager
{
    /** @var YmlFile */
    private YmlFile $ymlFile;

    /** @var int */
    private int $companyId;

    /** @var string */
    private string $url;

    /** @var SimpleXMLElement */
    private SimpleXMLElement $xml;

    /**
     * ImportManager constructor.
     * @param int    $companyId
     * @param string $url
     */
    public function __construct(int $companyId, string $url)
    {
        $this->companyId = $companyId;
        $this->url = $url;
    }

    /**
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function import()
    {
        $this->createLocalFile();
        $this->parseAndSaveCategories();
        $this->parseAndSaveOffers();
    }

    /**
     * @throws \Throwable
     * @throws \yii\db\Exception
     */
    public function createLocalFile(): void
    {
        $ymlFile = new YmlFile;
        $ymlFile->company_id = $this->companyId;
        $ymlFile->url = $this->url;
        $ymlFile->size = ImportHelper::getFileSize($this->url);
        $ymlFile->checked = false;
        $ymlFile->created_at = (new \DateTime)->format('Y-m-d H:i:s');
        $ymlFile->updated_at = (new \DateTime)->format('Y-m-d H:i:s');
        $ymlFile->local_filename = '';
        $ymlFile->insert(false);

        $ymlFolder = new Folder(Yii::$app->params['import']['folder']);
        $filename = $ymlFolder->getLocalNameForFileId($ymlFile->id);
        $ymlFile->local_filename = $filename;
        $ymlFile->save(false);

        if (!copy($this->url, $filename)) {
            throw new Exception("Cannot copy remote file to local: $filename");
        }
        $this->ymlFile = $ymlFile;
    }

    /**
     * @throws Exception
     */
    public function parseAndSaveCategories()
    {
        $ymlFile = $this->ymlFile;
        $xml = $this->xml = simplexml_load_file($ymlFile->local_filename);
        $sort = 1;
        foreach ($xml->shop->categories->children() as $category) {
            $ymlCategory = new YmlCategory;
            $ymlCategory->name = trim((string)$category);
            $ymlCategory->sort = $sort++;
            $ymlCategory->yml_file_id = $ymlFile->id;
            $ymlCategory->product_category_id = null;
            $ymlCategory->parent_id = $category['parent_id'];
            $ymlCategory->yml_id = $category['id'];
            if (!$ymlCategory->save(false)) {
                throw new Exception($ymlCategory->errors);
            }
        }
    }

    public function parseAndSaveOffers()
    {
        /** @var YmlOffer $fileOffer */
        foreach ($this->xml->shop->offers->children() as $fileOffer) {
            $offer = new YmlOffer;
            $offer->yml_file_id = $this->ymlFile->id;
            $offer->offer_id = $fileOffer['id'];
            $offer->available = 'true' == $fileOffer ? true : false;
            $offer->yml_category_id = (int)$fileOffer->categoryId;
            $offer->url = (string)$fileOffer->url;
            $offer->price = (double)$fileOffer->price;
            $offer->picture = (double)$fileOffer->picture;
            $offer->name = (string)$fileOffer->name;
            $offer->description = (string)$fileOffer->description;
            $offer->save(false);
        }
    }

    /**
     * а то места на ссд не хватит
     */
    public function __destruct()
    {
        unlink($this->ymlFile->local_filename);
    }
}
