<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%company}}`.
 */
class m191118_073934_add_url_column_to_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('company', 'url', $this->string()->null()->comment('YML URL'));
        $this->addColumn('company', 'url_periodical_check', $this->bool()->notNull()->comment('периодически обновлять информацию из файла'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('company', 'url_periodical_check');
        $this->dropColumn('company', 'url');
    }
}
