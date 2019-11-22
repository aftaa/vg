<?php

namespace console\controllers\vg\import;

use common\models\Area;
use Yii;
use yii\console\Controller;
use yii\db\Query;

class AreaTable extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
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
                } else {
                    echo "Area: $area->name added\n";
                }
            }

            foreach ($areas as $aw_area) {
                $area = Area::findOne($aw_area['areaid']);
                $area->parent_id = $aw_area['parentid'] ? $aw_area['parentid'] : null;
                if (!$area->save()) {
                    echo "$area->name\n";
                    print_r($area->errors);
                } else {
                    echo "Area: $area->name added\n";
                }
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

}