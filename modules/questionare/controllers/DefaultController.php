<?php

namespace app\modules\questionare\controllers;

use yii\web\Controller;

/**
 * Default controller for the `questionare` module
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
