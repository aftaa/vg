<?php

use yii\db\Migration;

/**
 * Class m190924_171813_set_null_thumb_where_thumb_is_empty_string_in_product_table
 */
class m190924_171813_set_null_thumb_where_thumb_is_empty_string_in_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db
            ->createCommand('UPDATE product SET thumb=NULL WHERE thumb="" AND thumb_checked=TRUE')
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190924_171813_set_null_thumb_where_thumb_is_empty_string_in_product_table cannot be reverted.\n";

        return false;
    }
    */
}
