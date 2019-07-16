<?php

namespace app\assets;

class DataTableAsset extends \yii\web\AssetBundle
{
    
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    
    public $css = [
        '//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css',
    ];
    public $js = [
        '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'
    ];
     public $depends = [
         'app\assets\DevAsset'
     ];
}

