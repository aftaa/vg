<?php

use yii\db\Migration;

/**
 * Class m190618_003237_import_data_into_member_table
 */
class m190618_003237_import_data_into_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190618_003237_import_data_into_member_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190618_003237_import_data_into_member_table cannot be reverted.\n";

        return false;
    }
    */
}
