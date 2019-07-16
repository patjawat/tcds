<?php
use app\components\PatientHelper;
use app\modules\document\models\Documentqr;
use app\modules\document\models\DocumentQrType;
use yii\helpers\Html;

$this->title = 'Documents';
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>

<style>
.gallery-title {
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

.filter-button-qr {
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #42B32F;
    margin-bottom: 30px;
}

.filter-button-qr:hover {
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;
}

.btn-default:active .filter-button-qr:active {
    background-color: #42B32F;
    color: white;
}

.port-image {
    width: 100%;

}

.gallery_product {
    margin-bottom: 30px;
}

.img-responsive,
.thumbnail>img,
.thumbnail a>img,
.carousel-inner>.item>img,
.carousel-inner>.item>a>img {
    display: block;
    max-width: 100%;
    height: auto;
    width: 47%;
    box-shadow: 0px 2px 20px 0 rgba(154, 161, 171, 0.28) !important;
    margin: 15px;
}
.container1 {
    /* display: flex;
  flex-direction: row; */
    display: flex;
    flex-wrap: wrap;
}

.item-qr {
    height: 330px;
    width: 316px;
    background-color: #e22bc1;
    margin: 2px;
}
</style>



<section>
    <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- <h1 class="gallery-title">Gallery</h1> -->
        </div>

<?php
$data = [];
foreach (Documentqr::find()->where(['hn' => $hn])->groupby(['type_id'])->all() as $key => $value):
    $data[] = $value->type_id;
endforeach;
?>

        <div align="center">
            <button class="btn btn-default filter-button-qr" data-filter="all">All</button>
            <?php foreach (DocumentQrType::find()->andWhere(['IN', 'id', $data])->all() as $type): ?>
            <button class="btn btn-default filter-button-qr" data-filter="<?=$type->id?>"><?=$type->name;?></button>
            <?php endforeach;?>
        </div>
        <!-- <br/> -->
        <div class="container1" id="images-qr">

            <?php foreach ($dataProvider->getModels() as $model): ?>
            <?php
$img = Documentqr::getUploadUrl() . '/' . $hn . '/' . $model->real_filename;
// $img = 'REG/'.$model->hn.'/'.$model->sub_dir.'/'.$model->filename.'.jpg';
echo Html::img($img, ['width' => '100%', 'class' => "img-responsive filter-qr $model->type_id"]);
?>
            <?php endforeach;?>
        </div>


    </div>
    </div>
</section>


<?php
$js = <<< JS

var image = $('#image-qr');

image.viewer({
  inline: true,
  viewed: function() {
    image.viewer('zoomTo', 1);
  }
});

// Get the Viewer.js instance after initialized
var viewer = image.data('viewer');

// View a list of images
$('#images-qr').viewer();
$(".filter-button-qr").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter-qr').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter-qr").not('.'+value).hide('3000');
            $('.filter-qr').filter('.'+value).show('3000');

        }
    });

    if ($(".filter-button-qr").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");
JS;
$this->registerJS($js);
?>