<?php

namespace frontend\controllers;

use common\models\Area;
use common\vg\controllers\FrontendController;

class AreaController extends FrontendController
{
    public function actionIndex(int $areaId)
    {
        $area = Area::findOne($areaId);

        return $this->render('index', [
            'area' => $area,
        ]);
    }

}
