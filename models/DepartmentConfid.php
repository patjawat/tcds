<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class DepartmentConfig extends Model
{
    public $name;

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'name',
        ];
    }

}
