<?php
use app\components\PatientHelper;
use kartik\dialog\Dialog;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
.panel-default>.panel-heading {
    color: #348ca7 !important;
}

.form-control-static {
    min-height: 34px;
    padding-top: 0px;
    padding-bottom: 7px;
    margin-bottom: 0;
}

.help-block {
    margin-top: -18px !important;
    margin-bottom: -18px !important;
}

.list-cell__med_cancel{
    width: 100px;
}
.list-cell__icode{
    width: 250px;
}
.med-cancel{
    background-color: #ccc;
    color: #555555;
}
.med-cancel:hover{
    background-color: #eee!important;
    color: #000;
}
/* .med-cancel-text{
    color: red;
    text-shadow: -1px 0px white, 0 1px white, 1px 0 white, 0 -1px white;
}
.med-active{
    color: #14b8cc;
    text-shadow: -1px 0px #333, 0 1px #555555, 1px 0 #555555, 0 -1px #333;
} */
</style>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'id' => 'grid-med-accept',
    'pjax' => true,
    'bordered' => true,
    'striped' => false,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => '10'],
    'perfectScrollbar' => true,
    'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
    'rowOptions' => function ($model) {
        if ($model->med_cancel == '1') {
            return ['class' => 'med-cancel'];
        }
    },
    'toolbar' => [
        [
            'content' => Html::a('<i class="fas fa-save"></i> </i>บันทึกจัดยา',
                ['/med/default/accept-view', 'id' => $id], [
                    'title' => 'Add',
                    'id' => 'med-accept-save',
                    'class' => 'btn btn-primary pull-right',
                    // 'data-confirm' => 'ยืนยัน',
                    // 'data-method' => 'post'
                ]),
            'toolbarContainerOptions' => ['class' => 'btn-toolbar pull-right'],
        ],
    ],
    'panel' => [
        'heading' => '<h3 class="panel-title"><i class="fas fa-user-tag"></i> NAME : ' . $model->patient($model->hn) . '</h3>',
        'type' => GridView::TYPE_DEFAULT,
        'before' => '
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <h5> HN : <code>' . $model->hn . '</code> </h5> </div>
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3"> <h5> Physician : <code>1234</code></h5> </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"> <h5> ผล LAB eGFR : <code>1234</code></h5> </div>
            </div>',
        'after' => '<i class="fas fa-check"></i>  <span class="label label-success">รายการที่ใช้งาน </span>&nbsp |  <i class="fas fa-times"></i>  <span class="label label-default">รายการที่ถูกยกเลิก</span>',
        'showFooter' => false,
    ],
    // 'krajeeDialogSettings' => [
    //     'id' => 'a22',
    //     'libName' => 'krajeeDialogCust', // ตั้งชื่อของ Dialog
    //     'overrideYiiConfirm' => true,
    //     'options' => [
    //         'title' => '<i class="fas fa-edit"></i> รับทราบ',
    //         'size' => Dialog::SIZE_MEDIUM,
    //         'type' => Dialog::TYPE_PRIMARY,
    //         'buttons' => [
    //             [
    //                 'label' => 'Cancel',
    //                // 'icon' => Dialog::ICON_CANCEL
    //             ],
    //             [
    //                 'label' =>  'Ok',
    //                 //'icon' => Dialog::ICON_OK,
    //                 'class' => 'btn-primary'
    //             ],
    //         ]
    //     ],
    // ],
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '36px',
            'pageSummary' => 'Total',
            'pageSummaryOptions' => ['colspan' => 6],
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
        [
            'attribute' => 'icode',
            'header' => 'รายการ',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '5%',
        ],
        [
            'attribute' => 'druguse',
            'vAlign' => 'middle',
            'hAlign' => 'left',
            'width' => '35%',
            'value' => function ($model) {
                return $model->Drugitems($model->icode);
            },
        ],
        [
            'attribute' => 'qty',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'width' => '5%',
        ],
        [
            'attribute' => 'qty_adjust',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'width' => '5%',
            'format' => 'raw',
            'value' => function ($model) {
                return $model->qty_adjust;
            },

        ],
        'med_note',
        [
            'class' => 'kartik\grid\ActionColumn',
            'header' => 'ยกเลิกยา',
            'width' => '100px',
            'template' => '{med-canel}',
            'buttons' => [
                'med-canel' => function ($url, $model, $key) {
                    // return Html::a($model->med_cancel == '0' ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>',
                    //     ['/med/default/med-cancel', 'type' => $model->med_cancel == '0' ? '1' : '0'],
                    //     [
                    //         'class' => $model->med_cancel == "1" ? 'med-cancel-text' : 'med-active',
                    //         'id' => $key,
                    //         // 'url' => 'index.php?r=med/default/med-cancel',
                    //         'onclick' => '
                    //        return medCancel(' . $key . ',$(this).attr("href"));
                    //     ',
                    //     ]
                    // );
                    return $model->med_cancel == '0' ? '<i class="fas fa-check med-active"></i> <span class="label label-success">ใช้ </span>' : '<i class="fas fa-times med-cancel-text"></i> <span class="label label-default">ยกเลิก </span>';

                },
            ],
            'dropdownOptions' => ['class' => 'float-right'],
            'urlCreator' => function ($action, $model, $key, $index) {return '#';},
            'viewOptions' => ['title' => 'This will launch the book details page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
            'updateOptions' => ['title' => 'This will launch the book update page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
            'deleteOptions' => ['title' => 'This will launch the book delete action. Disabled for this demo!', 'data-toggle' => 'tooltip'],
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
    ],
]);?>

<?php

// Example 2: Custom krajeeDialogCust object
echo Dialog::widget([
    'libName' => 'krajeeDialogCust', // optional if not set will default to `krajeeDialog`
    'options' => ['draggable' => true, 'closable' => true], // custom options
]);

echo $id;
$request = Yii::$app->request;
echo $resUrl = $request->url;
// echo $request->absoluteUrl;
$js = <<< JS

$('#med-accept-save').click(function (e) {

    e.preventDefault();
    $.ajax({
        type: "get",
        url: "index.php?r=med/default/requester",
        dataType: "json",
        success: function (response) {
             $('#main-modal').modal('show');
            $('.modal-title').html(response.title);
            $('.modal-body').html(response.content);
            $('.modal-footer').html(response.footer);
        }
    });



});
// $('#med-accept-pjax').on('pjax:success', function() {
//     $.pjax.reload({container: '#med-cancel-pjax'});
// });

JS;
$this->registerJS($js, View::POS_END, 'my-options');
?>