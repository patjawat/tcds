<?php

namespace app\modules\chiefcomplaint\controllers;

// use yii\web\Controller;
use app\components\VisitController as Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }


}
