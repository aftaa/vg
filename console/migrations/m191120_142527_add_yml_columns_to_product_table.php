<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m191120_142527_add_yml_columns_to_product_table extends Migration
{
    const TABLE_NAME = 'product';
    const YML_URL_COLUMN = 'yml_url';
    const YML_FILE_ID_COLUMN = 'yml_file_id';
    const FK_PRODUCT_YML_FILE_ID = 'fk-product-yml-file-id';
    const IDX_YML_FILE_ID = 'idx-yml-file-id';
    const IDX_YML_URL = 'idx-yml-url';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, self::YML_FILE_ID_COLUMN, $this->integer()->null()->comment('YML файл'));
        $this->addColumn(self::TABLE_NAME, self::YML_URL_COLUMN, $this->string()->null()->comment('Ссылка'));
        $this->addColumn(self::TABLE_NAME, 'yml_id', $this->integer()->null()->comment('ID в YML-файле'));

        $this->createIndex(self::IDX_YML_FILE_ID, self::TABLE_NAME, self::YML_FILE_ID_COLUMN);
        $this->createIndex(self::IDX_YML_URL, self::TABLE_NAME, self::YML_URL_COLUMN);

        $this->addForeignKey(self::FK_PRODUCT_YML_FILE_ID, self::TABLE_NAME, self::YML_FILE_ID_COLUMN,
            'yml_file', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_PRODUCT_YML_FILE_ID, self::TABLE_NAME);

        $this->dropIndex(self::IDX_YML_URL, self::TABLE_NAME);
        $this->dropIndex(self::IDX_YML_FILE_ID, self::TABLE_NAME);

        $this->dropColumn(self::TABLE_NAME, self::YML_URL_COLUMN);
        $this->dropColumn(self::TABLE_NAME, self::YML_FILE_ID_COLUMN);
    }
}
