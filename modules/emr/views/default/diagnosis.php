<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use lo\widgets\modal\ModalAjax;
use cenotia\components\modal\RemoteModal;
$this->title = 'Diagnoses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-index">
    <?php //Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php //Html::a('<i class="fas fa-stethoscope"></i> Diagnosis',['/doctorworkbench/diagnosis/show-items'] ,['role'=>'remoteModal-ajax','class' =>'btn btn-danger'])?>
    <div style="background-color:#fff;">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'grid-diagnosis',
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
[
    'attribute' => 'date_service',
    'group' => true,  // enable grouping
    'groupedRow' => true,                    // move grouped column to a single grouped row
    'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
    'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
    'value' => function($model){
        return $model->date_service;
    } 
],
[
    'attribute' => 'vn',
    'group' => true,  // enable grouping  
    'subGroupOf' => 1,        
    'hAlign' => 'center',
    'vAlign' => 'middle',         // move grouped column to a single grouped row
    'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
    'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
    'value' => function($model){
        return $model->vn;
    } 
],
            'icd10tm.diagename',
            // 'icd10tm.diagtname',
            'diagtype1.name',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px;',
                    'noWrap' => true
                ],
                'template' => '<div>{delete}</div>',
                'buttons' => [
                    'delete' => function($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "
                                    if (confirm('ลบข้อมูล?')) {
                                        $.ajax('$url', {
                                            type: 'POST'
                                        }).done(function(data) {
                                            // $.pjax.reload({
                                            //     container:data.forceReload,
                                            //     history:false,
                                            //     replace: false,
                                            //     url: data.url  
                                            //     });
                                            loadDiagnosis();
                                        });
                                    }
                                    return false;
                                ",
                        ]);
                    }
                ]
            ]
        ],
    ]); ?>

    </div>
    <?php //Pjax::end(); ?>
</div>

<?php
$js = <<< JS

// loadDiagnosisForm();

$('[role="modal-remote"]').click(function(e){
    var url = $(this).attr('value');
    $('#doctorworkbench-modal').modal('show');
    $.ajax({
        type: "get",
        url: url,
        // beforeSend:function(){
        //     $('.modal-title').html('Loadding...');
        //     $('.modal-body').html('<img src="img/loading2.gif" style="margin-left: 40%;margin-top: 10%;padding-bottom: 10%;width: 23%;" />');
        // },
        // dataType: "json",
        success: function (response) {
            $('.modal-title').html(response.title);
            $('.modal-body').html(response.content);
            $('.modal-footer').html(response.footer);   
           
        }
    });

});



function loadDiagnosisForm(){
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/diagnosis/create",
        dataType: "json",
        success: function (response) {
            // $('#diagenosisForm').html(response);
        }
    });
}

JS;
$this->registerJS($js);
?>