<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductCategory]].
 *
 * @see ProductCategory
 */
class ProductCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * ProductCategoryQuery constructor.
     */
    public function __construct()
    {
        parent::__construct(ProductCategory::class);
    }

    /**
     * {@inheritdoc}
     * @return ProductCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param int $parentId
     * @return \yii\db\ActiveQuery
     */
    public function parentId(int $parentId)
    {
        return parent::where(['parent_id' => $parentId]);
    }
}
