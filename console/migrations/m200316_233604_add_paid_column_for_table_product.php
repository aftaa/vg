<?php

use yii\db\Migration;

/**
 * Class m200316_233604_add_paid_column_for_table_product
 */
class m200316_233604_add_paid_column_for_table_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'paid',
            $this->boolean()->defaultValue(false)->notNull()->comment('Оплачен'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200316_233604_add_paid_column_for_table_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200316_233604_add_paid_column_for_table_product cannot be reverted.\n";

        return false;
    }
    */
}
