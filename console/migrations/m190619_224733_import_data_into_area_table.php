<?php

use common\models\Area;
use yii\db\Migration;
use yii\db\Query;

/**
 * Class m190619_224733_import_data_into_area_table
 */
class m190619_224733_import_data_into_area_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $db = Yii::$app->dbVsetigTest;

        $areas = (new Query)
            ->select('*')
            ->from('aw_area')
            ->all($db);

        try {
            foreach ($areas as $aw_area) {
                $area = new Area;
                $area->id = $aw_area['areaid'];
                $area->name = $aw_area['areaname'];
                $area->sort = $aw_area['areaorder'];

                if (!$area->save()) {
                    print_r($area->errors);
                }
            }

            foreach ($areas as $aw_area) {
                $area = Area::findOne($aw_area['areaid']);
                $area->parent_id = $aw_area['parentid'] ? $aw_area['parentid'] : null;
                if (!$area->save()) {
                    echo "$area->name\n";
                    print_r($area->errors);
                }
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('TRUNCATE TABLE area')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190619_224733_import_data_into_area_table cannot be reverted.\n";

        return false;
    }
    */
}
