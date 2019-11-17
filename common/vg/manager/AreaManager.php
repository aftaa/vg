<?php

namespace common\vg\manager;

use yii\db\Query;

class AreaManager
{
    /**
     * @return array
     */
    public  function getAreas(): array
    {
        $areas = (new Query)
            ->select('t1.*, t1.id AS id1, COUNT(t2.id) AS cnt')
            ->from('area AS t1')
            ->join('JOIN', 'area AS t2', 't1.id=t2.parent_id')
            ->where('t1.parent_id IS NULL')
            ->groupBy('t1.id')
            ->indexBy('id1')
            ->all();

        foreach ($areas as &$area) {
            if ($area['cnt'] >= 100) {
                $area['class'] = 'h3';
            } elseif ($area['cnt'] >= 70) {
                $area['class'] = 'h3';
            } elseif ($area['cnt'] >= 60) {
                $area['class'] = 'h3';
            } elseif ($area['cnt'] >= 50) {
                $area['class'] = 'h4';
            } elseif ($area['cnt'] >= 40) {
                $area['class'] = 'h4';
            } else {
                $area['class'] = 'h4';
            }
        }
        return $areas;
    }
}
