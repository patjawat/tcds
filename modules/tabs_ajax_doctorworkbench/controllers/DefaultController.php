<?php

namespace app\modules\doctorworkbench\controllers;
use Yii;
use yii\web\Controller;


/**
 * Default controller for the `doctorworkbench` module
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
