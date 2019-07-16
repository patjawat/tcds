<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\tabs\TabsX;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\select2\Select2;
use lo\widgets\modal\ModalAjax;
use app\components\PatientHelper;
use app\modules\document\models\Document;
use app\modules\document\models\DocumentType;
use app\modules\document\models\DocumentQrType;
use app\modules\document\models\Documentqr;

                    echo FileInput::widget([
                        'name' => 'upload_ajax[]',
                        'id' => 'input107',
                                    'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                                    'pluginOptions' => [
                                        'overwriteInitial'=>false,
                                        'initialPreviewShowDelete'=>true,
                                        'initialPreview'=> $initialPreview,
                                        'initialPreviewConfig'=> $initialPreviewConfig,
                                        'uploadUrl' => 'index.php?r=document/documentqr/upload-ajax',
                                        'uploadExtraData' => [
                                         'type_id' => $type_id,
                                        ],
                                        'maxFileCount' => 100
                                    ],
                                    'pluginEvents' => [
                                        "fileimagesloaded" => "function() { console.log('fileimagesloaded'); }",
                                        "filereset" => "function() { console.log('filereset'); }",
                                        "filechunksuccess" => "function() { console.log('filechunksuccess'); }",
                                        "filebatchuploadcomplete" => "function() { 
                                             loadEmrDocumentQR();
                                         }",
                                    //    "filebeforedelete" => "function() { loadEmrDocumentQR(); }",
                                       "filepreupload" => "function() { console.log('filepreupload'); }",
                                    ]
                    ]);
                    ?>