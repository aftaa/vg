<?php

namespace frontend\controllers;

use common\models\Area;
use common\vg\FrontendController;

class AreaController extends FrontendController
{
    public function actionAll()
    {
        $areas = Area::find()
            ->where(['parent_id' => null])
            ->orderBy('sort ASC')
            ->all();

        return $this->render('index', [
            'areas' => $areas,
        ]);
    }

}
