<?php

namespace app\modules\lab\models;

/**
 * This is the ActiveQuery class for [[LabResult]].
 *
 * @see LabResult
 */
class LabQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LabResult[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LabResult|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function Test(){
        $this->where(['test' => 'T3']);
    }
}
