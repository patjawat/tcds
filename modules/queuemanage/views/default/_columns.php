<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\doctorworkbench\models\CDrugusage;
use yii\helpers\ArrayHelper;
use kartik\editable\Editable;
use kartik\grid\GridView;
use yii\helpers\Json;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],

   [
       'class' => '\kartik\grid\DataColumn',
       'header' => 'เวลา',
       'value' => function($model){
       // return $model['visit_time_begin'];
    }
   
   ],
   [
       'class'=>'\kartik\grid\DataColumn',
       'header'=>'HN',
       'value' => function($model){
        return $model['hn'];
    }
      
   ],
   [
    'header' => 'ชื่อ-สกุล',
    'value' => function($model){
       // return $model['fullname'];
    }
   
],
[
    'header' => 'อายุ',
    'value' => function($model){
       //return $model['age'];
    }
],
[
    'attribute' => 'visit_department',
    'header' => 'แผนก',
    'value' => function($model){
        //return $model['visit_department'];
    }
  
],
[
    'attribute' => 'visit_department',
    'header' => 'สถานะ',
    'value' => function($model){
        //return $model['visit_department'];
    }
  
],
          [
          'class' => 'kartik\grid\ActionColumn',
          'header' => 'Action',
          'template' => '{lab} | {doctor-room}',
          'dropdown' => false,
          'vAlign'=>'middle',
          'width' => '200px',
          'urlCreator' => function($action, $model, $key, $index) {
          return Url::to([$action,'id'=>$key]);
          },
          'buttons'=>[
            'lab' => function($url,$model,$key){
                return Html::a('<i class="fas fa-vial"></i> ผลแลป',$url,['style' => 'color:#2f8b9a;','role' => 'view_lab']);
              },

                'doctor-room' => function($url,$model,$key){
                    return Html::a('<i class="fas fa-sign-in-alt"></i> ส่งตรวจ',['/queuemanage/default/doctor-room','hn' => $model['hn'],'pcc_vn' => $model['pcc_vn']],['style' => 'color:#2f8b9a;','role' => 'view_lab']);
                  }
                ]
          ],
        
];
