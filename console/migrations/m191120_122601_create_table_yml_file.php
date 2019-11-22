<?php

use common\models\Company;
use yii\db\Migration;

/**
 * Class m191120_122601_create_table_yml_file
 */
class m191120_122601_create_table_yml_file extends Migration
{
    const IDX_COMPANY_ID = 'idx-company-id';
    const TABLE_NAME = 'yml_file';
    const COLUMN_NAME = 'company_id';
    const FK_COMPANY_ID = 'fk-yml-company-id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'              => $this->primaryKey()->comment('№'),
            self::COLUMN_NAME => $this->integer()->notNull()->comment('Компания'),
            'url'             => $this->string()->notNull()->comment('URL'),
            'local_filename'  => $this->string()->notNull()->comment('Локальное имя файла'),
            'size'            => $this->bigInteger()->notNull()->comment('Размер в байтах'),
            'checked'         => $this->boolean()->notNull()->defaultValue(false)->comment('Проверен'),
            'created_at'      => $this->dateTime()->notNull()->comment('Создан'),
            'updated_at'      => $this->dateTime()->notNull()->comment('Обновлен'),
        ]);

        $this->createIndex(self::IDX_COMPANY_ID, self::TABLE_NAME, self::COLUMN_NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        $this->dropIndex(self::IDX_COMPANY_ID, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191120_122601_create_table_yml_file cannot be reverted.\n";

        return false;
    }
    */
}
