<?php

use yii\db\Migration;

/**
 * Class m200218_110718_add_yml_id_to_yml_category_table
 */
class m200218_110718_add_yml_id_to_yml_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('yml_category', 'yml_id',
            $this->integer()->notNull()->after('id')->comment('YML id')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('yml_category', 'yml_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200218_110718_add_yml_id_to_yml_category_table cannot be reverted.\n";

        return false;
    }
    */
}
