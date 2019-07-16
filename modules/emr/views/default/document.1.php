<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\components\PatientHelper;
use kartik\tabs\TabsX;
use app\modules\document\models\Document;
use app\modules\document\models\DocumentType;

$this->title = 'Documents';
// $hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>



<?php
$items = [
    [
        'label'=>'<i class="fas fa-home"></i> Home',
        'content'=>'aa',
        'active'=>true,
        'options' => ['id' => 'home'],
    ],
    [
        'label' => '<i class="far fa-folder-open"></i> Document',
        'linkOptions' => ['data-url' => Url::to(['/emr/default/document'])],
        'options' => ['id' => 'main-document'],
        // 'encode'=>true,
        // 'encodeLabels'=>true
    ],
];
echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);
?>

<?php
$items = [
    [
        'label'=>'<i class="fas fa-home"></i> Home',
        'content'=>'aa',
        'active'=>true,
        'options' => ['id' => 'home'],
    ],
    [
        'label' => '<i class="far fa-folder-open"></i> Document',
        'linkOptions' => ['data-url' => Url::to(['/emr/default/document'])],
        'options' => ['id' => 'main-document'],
        // 'encode'=>true,
        // 'encodeLabels'=>true
    ],
];
echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_LEFT,
    'encodeLabels'=>false,
    'enableStickyTabs' => true,
    'stickyTabsOptions' => [
        'selectorAttribute' => 'data-target',
        'backToTop' => true,
    ],
]);
?>
<style>

.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #42B32F;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
    
}

.gallery_product
{
    margin-bottom: 30px;
}

.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    max-width: 100%;
    height: auto;
    width: 443px;
}

</style>

<section>
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- <h1 class="gallery-title">Gallery</h1> -->
        </div>
        <?php
$data = [];

foreach (Document::find()->where(['hn' => $hn])->groupby(['sub_dir'])->all()  as $key => $value):
    $data[]=$value->sub_dir;
endforeach;

?>

        <div align="center">
        <button class="btn btn-default filter-button" data-filter="all">All</button>
        <?php foreach (DocumentType::find()->andWhere(['IN','id',$data])->all() as $type):?>
             <button class="btn btn-default filter-button" data-filter="<?=$type->id?>"><?=$type->name;?></button>
        <?php endforeach;?>
           
          
           
        </div>
        <!-- <br/> -->


<?php foreach ($dataProvider->getModels() as $model):?>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter <?=$model->sub_dir?>">
            <?php  
            $img = 'REG/'.$model->hn.'/'.$model->sub_dir.'/'.$model->filename.'.jpg';
                        echo Html::img($img,['width' => '100%','class'=>"img-responsive"]);
            ?>
            </div>


<?php endforeach;?>
        </div>
    </div>
</section>

    
<?php
$js = <<< JS

$(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");



JS;
$this->registerJS($js);
?>