<?php

namespace app\modules\report\controllers;

use yii\web\Controller;
use Yii;
use app\modules\stock\models\PccServiceMedication;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionNextDispen() {
        return $this->render('next-dispen',[
            'pagination' => FALSE
        ]);
    }
}
