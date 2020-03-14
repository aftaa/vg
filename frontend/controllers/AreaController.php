<?php

namespace frontend\controllers;

use common\models\Area;
use common\vg\controllers\FrontendController;
use vsetigoroda\Banner;
use vsetigoroda\billing\TariffFree;

class AreaController extends FrontendController
{
    public function actionIndex(int $areaId)
    {
        $area = Area::findOne($areaId);

        return $this->render('index', [
            'area' => $area,
        ]);
    }

    public function actionDdd()
    {
        new Banner();

        $tariffFree = new TariffFree;
        echo '<pre>'; print_r($tariffFree); echo '</pre>'; die;
    }

}
