<?php

use yii\db\Migration;

/**
 * Class m191202_211938_alter_table_yml_category
 */
class m191202_211938_alter_table_yml_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropPrimaryKey('PRIMARY KEY', 'yml_category');
        $this->addPrimaryKey('pk-yml-category', 'yml_category', ['id', 'yml_file_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191202_211938_alter_table_yml_category cannot be reverted.\n";

        return false;
    }
    */
}
