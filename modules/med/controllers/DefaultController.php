<?php

namespace app\modules\med\controllers;

use yii\web\Controller;

/**
 * Default controller for the `med` module
 */
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
}
