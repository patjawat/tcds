<?php

namespace app\modules\doctorworkbench\models;

use Yii;
class Doctorworkbench extends \yii\db\ActiveRecord
{

    public $hn;
    public $vn;
    public $fullname;
    public $age;
    public $cc;
    public $claim;
    public $department;

    public $title;
    public $description;
    public $file;
    public $date;

    public function rules()
    {
        return [
            [['hn','vn','fullname','age','cc','claim','department','icd10_name',
            'title', 'description','title'
        ], 
            'safe'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vn' => 'Vn',
            'hn' => 'Hn',
            'fullname' => 'ชื่อ-สกุล',
            'age' => 'อายุ',
            'cc' => 'CC',
            'claim' => 'สิทธิ',
            'department' => 'แผนก'

        ];
    }
}
