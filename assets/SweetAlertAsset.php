<?php

namespace app\assets;

class SweetAlertAsset extends \yii\web\AssetBundle
{
    
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = 'js';
    public $css = [
        'swal/sweetalert.css',
    ];
    public $js = [
        'swal/sweetalert.min.js'
    ];
}

