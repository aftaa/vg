<?php

use yii\db\Migration;

/**
 * Handles adding tariffs to table `{{%company}}`.
 */
class m190829_111001_add_tariffs_column_to_company_table extends Migration
{
    const TABLE_NAME = 'company';
    const TARIFF_ID_COLUMN = 'tariff_id';
    const OLD_TARIF_COLUMN = 'old_tarif';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, self::TARIFF_ID_COLUMN, $this->integer()->comment('Тарифный план'));
        $this->addColumn(self::TABLE_NAME, self::OLD_TARIF_COLUMN, $this->string()->comment('Тариф по старой базе'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME, self::TARIFF_ID_COLUMN);
        $this->dropColumn(self::TABLE_NAME, self::OLD_TARIF_COLUMN);
    }
}
