<?php

use yii\db\Migration;

/**
 * Class m191202_204040_create_table_yml_offer
 */
class m191202_204040_create_table_yml_offer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('yml_offer', [
            'yml_file_id'     => $this->integer()->null(),
            'offer_id'        => $this->integer()->notNull(),
            'yml_category_id' => $this->integer()->null(),
            'available'       => $this->boolean()->null(),
            'url'             => $this->string(500)->null(),
            'price'           => $this->decimal(10, 2)->null(),
            'picture'         => $this->string(500)->null(),
            'name'            => $this->string(250)->null(),
            'description'     => $this->text()->null(),
        ]);

        $this->addPrimaryKey('pk-yml-offer', 'yml_offer', ['yml_file_id', 'offer_id']);
        $this->addForeignKey('fk-yml-offer-yml-category', 'yml_offer', 'yml_category_id', 'yml_category', 'id');
        $this->addForeignKey('fk-yml-offer-yml-file', 'yml_offer', 'yml_category_id', 'yml_category', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-yml-offer-yml-file', 'yml_offer');
        $this->dropForeignKey('fk-yml-offer-yml-category', 'yml_offer');
        $this->dropPrimaryKey('pk-yml-offer', 'yml_offer');
        $this->dropTable('yml_offer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191202_204040_create_table_yml_offer cannot be reverted.\n";

        return false;
    }
    */
}
