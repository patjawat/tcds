
<?php
use app\components\PatientHelper;
use app\components\DateTimeHelper;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use kartik\grid\GridView;

$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
 ?>
<?php
$dataProvider = new ArrayDataProvider([
    'allModels' => PatientHelper::DrugAllergy(),
    'pagination' => [
        'pageSize' => 100,
    ],
]);
// get the rows in the currently requested page
// $rows = $provider->getModels();

 ?>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><i class="fas fa-capsules"></i> แพ้ยา</a></li>
    <li><a data-toggle="tab" href="#menu1"><i class="fas fa-syringe"></i> การฉีดวัคซีน</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php
      echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
              'header' => 'รายการแพ้ยา',
              'value' => function($model){
                if(array_key_exists("drug_name",$model)){
                  return $model->drug_name;
                }elseif (array_key_exists("phamaco_name",$model)) {
                  return $model->phamaco_name;
                }elseif (array_key_exists("generic_name",$model)) {
                  return $model->generic_name;
                }
              }
            ],
            [
              'header' => 'Group',
              'group' => true,
              'groupedRow' => true,
              'groupOddCssClass' => 'kv-grouped-row',
              'groupEvenCssClass' => 'kv-grouped-row',
              'value' => function($model){
                   if(array_key_exists("drug_name",$model)){
                     return 'DRUG NAME';
                   }elseif (array_key_exists("phamaco_name",$model)) {
                     return 'PHAMACO NAME';
                   }elseif (array_key_exists("generic_name",$model)) {
                     return 'GENERIC NAME';
                   }else {
                     return 'REMARK';
                   }
              }
            ],
            [
              'header' => 'อาการที่แพ้',
              'value' => function($model){
                return $model->description;
              }
            ],
            [
              'header' => 'วันที่บันทึก',
              'value' => function($model){
                return DateTimeHelper::getDateToThai($model->update_date);
              }
            ]
        ],
    ]);
      ?>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3> <i class="fas fa-syringe"></i>การฉีดวัคซีน</h3>
      
    </div>
  </div>