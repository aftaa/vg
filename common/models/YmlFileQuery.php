<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[YmlFile]].
 *
 * @see YmlFile
 */
class YmlFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return YmlFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return YmlFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
