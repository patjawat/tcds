<?php

namespace app\modules_share\foot\assets;

use yii\web\AssetBundle;
/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FootAsset extends AssetBundle
{
    public $sousePath = '@app/modules_share/foot/assets/dist/';
    public $css = [
        'css/style.css'
    ];
    public $js = [
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
