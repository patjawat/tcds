<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DevAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        // 'css/font-awesome-4.7.0/css/font-awesome.min.css',
        'css/font-awesome-animation.min.css',
        'css/fontawesome-free-5.3.1/css/all.min.css',
        'css/dev-theme2.css',
        'css/animate.css',
        // 'css/bttn.min.css',
        // 'css/btn-plus.css',
        'css/menu.css',
        'jquery-loadding/jquery.loading.min.css',
         'jquery-confirm/jquery-confirm.min.css'
    ];
    public $js = [
        'js/main.js',
        'js/yii_overrides.js',
        'jquery-loadding/jquery.loading.min.js',
        'js/chiefcomplaint.js',
        'js/doctorworkbench.js',
        'js/emr.js',
        'jquery-confirm/jquery-confirm.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\SweetAlertAsset'
    ];

}
