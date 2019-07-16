<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use app\modules\lab\models\LabResult;
use app\components\FormatYear;
use yii\helpers\ArrayHelper;
use app\components\PatientHelper;
use lo\widgets\modal\ModalAjax;
$hn = PatientHelper::getCurrentHn();

$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);

?>

<!-- <h1>Lab Result on Patient : 817452</h1> -->
<style media="screen">
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 0px 0;
    border-radius: 4px;
}
#labview-container{
  height: 500px;
  /* background-color: #eee; */
  /* border-style: solid; */
  border-bottom: .25rem solid #36b9cc!important;
}
</style>
<?php
echo ModalAjax::widget([
  'id' => 'lab-select',
  'selector' => 'a.btn', // all buttons in grid view with href attribute

  'options' => ['class' => 'header-default'],
  'pjaxContainer' => '#grid-company-pjax',
  
]);

?>

<span class="view-select">แสดงรายการที่เลือก</span>
<?php

// $query = LabResult::find()
// ->where(['patient_id' => '817452'])
// ->where(['lis_code' => '10120'])
// ->andWhere(['BETWEEN', 'checkin_date', '2018-11-16', '2018-11-16'])
// ->orderBy('checkin_time DESC')->limit(4)->all();
// foreach ($query as $key => $value) {
//   echo $value->checkin_date.' : '. $value->checkin_time.'<br>';
// }

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    // 'filterPosition' => \yii\grid\GridView::FILTER_POS_HEADER,
    // 'layout'=>"{pager}\n{summary}\n{items}",
    'id' => 'labview',
    'pjax' => true,
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => '20'],
    'perfectScrollbar' => true,
    'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
    'filterSelector' => "select[name='".$dataProvider->getPagination()->pageSizeParam."'],input[name='".$dataProvider->getPagination()->pageParam."']",
'pager' => [
    'class' => \liyunfang\pager\LinkPager::className(),
    'template' => '<div class="row" style="margin-top: 20px;"> <div class="col-md-10">{pageButtons}</div> <div class="col-md-2">{pageSize}</div></div>',
    'pageSizeList' => [50,100,500],
    'pageSizeMargin' => 'margin-left:5px;margin-right:5px;',
    'pageSizeOptions' => ['class' => 'form-control','style' => 'display: inline-block;width:100px;margin-top:0px;'],
    'customPageWidth' => 50,
    'customPageBefore' => ' Jump to ',
    'customPageAfter' => ' Page ',
    'customPageMargin' => 'margin-left:50px;margin-right:5px;',
    'customPageOptions' => ['class' => 'form-control','style' => 'display: inline-block;margin-top:0px;'],
    'prevPageLabel' => 'Previous',
    'nextPageLabel' => 'Next',
    'firstPageLabel'=>'First',
    'lastPageLabel'=>'Last',
    'nextPageCssClass'=>'next',
    'prevPageCssClass'=>'prev',
    'firstPageCssClass'=>'first',
    'lastPageCssClass'=>'last',
],
'rowOptions' => function ($model, $key, $index, $grid) { //สามารถกำหนด data-key ใหม่ (ปกติจะใช้ PK)
  return ['data' => ['key' => [
    'lis_code' => $model->lis_code,
    'test' => $model->test,
    'normal_range' => $model->normal_range
  ]]];
},
    'columns' => [
      [
  'class' => 'kartik\grid\SerialColumn',
  'contentOptions' => ['class' => 'kartik-sheet-style'],
  'width' => '36px',
  'header' => '#',
  'headerOptions' => ['class' => 'kartik-sheet-style']
],
[
  'class' => 'kartik\grid\CheckboxColumn',
  'headerOptions' => ['class' => 'kartik-sheet-style'],
],
        [
            // 'attribute' => 'lis_code',
            'header' => 'รหัสผลตรวจ',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '5%',
              'value' => function ($model, $key, $index, $widget) {
                return $model->lis_code;
              }
        ],
            [
          'attribute' => 'lis_code',
          'vAlign' => 'middle',
          'width' => '30%',
          'value' => function ($model, $key, $index, $widget) {
            return $model->test;
              // return Html::a($model->lab_code,
              //     '#',
              //     ['title' => 'View author detail', 'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")']);
          },
          'filterType' => GridView::FILTER_SELECT2,
          'filter' => ArrayHelper::map(LabResult::find()->where(['patient_id' => $hn])->groupBy(['lis_code'])->all(), 'lis_code', 'test'),
          'filterWidgetOptions' => [
              'pluginOptions' => ['allowClear' => true],
              'options' => ['multiple' => true]
          ],
          'filterInputOptions' => ['placeholder' => 'Select Lab Name'],
          'format' => 'raw'
          ],
        [
            'attribute' => 'normal_range',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
        ],
        [
            'attribute' => 'unit',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
        ],
        [
            'header' => '<span id="h_date1">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '50px',
            'format' => 'raw',
            'value' => function($model){
              $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
              return count($data) > 2 ? '<code>'.$data[0]->result.'</code>' : '-';
            },
            'filter' => function($model){
              return $model->checkin_date;
            }

        ],

        [
            'header' => '<span id="h_date2">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
          'width' => '50px',
            'format' => 'raw',
            'value' => function($model){
              $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
              return count($data) > 2 ? '<code>'.$data[1]->result.'</code>' : '-';
            }
        ],
        [
            'header' => '<span id="h_date3">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => 'raw',
            'width' => '50px',
            'value' => function($model){
             $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
             return count($data) > 2 ? '<code>'.$data[2]->result.'</code>' : '-';

             // return $model->lis_code;
            }
        ],
        [
          'header' => '<span id="h_date4">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => 'raw',
            'width' => '50px',
            'value' => function($model){
            $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
            return count($data) > 3 ? '<code>'.$data[3]->result.'</code>' : '-';

            }
        ],
      ]
]);
 ?>

 <?php
$js = <<< JS

loadLabel();

$('#labview-pjax').on('pjax:end', function(event, data, status, xhr, options) {
  loadLabel();

  });


  $('.view-select').click(function(e){
    var clicked = false;
  $(".kv-row-checkbox").prop("checked", !clicked);
  clicked = !clicked;

  var keys = $('#labview').yiiGridView('getSelectedRows');
    console.log(keys);

    $.ajax({
      type: "post",
      url: "index.php?r=lab/default/lab-result-select",
      data: {keys:keys},
      dataType: "json",
      success: function (response) {
        $('#lab-select').modal('show');
        $('.modal-header').html('แสดงรายการผลแล็บทั้งทั้งหมด');
        $('.modal-body').html(response);
      }
    });
  });

  function loadLabel(){
$.ajax({
  url: 'index.php?r=lab/default/lab-date',
  type: 'get',
  dataType: 'json',
  // data: {param1: 'value1'}
  success: function(response){
    $('#h_date1').text(response.h_date1);
    $('#h_date2').text(response.h_date2);
    $('#h_date3').text(response.h_date3);
    $('#h_date4').text(response.h_date4);


  }
});
}

JS;
$this->registerJS($js);
  ?>
