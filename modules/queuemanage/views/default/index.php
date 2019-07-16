<?php
use yii\helpers\Html;
use yii\helpers\Url;
use cenotia\components\modal\RemoteModal;
use app\modules\settings\models\CDepartment;


?>

<?php RemoteModal::begin([
	"id"=>"view_lab",
	"options"=> [ "class"=>"fade slide-down "],
	"footer"=>"", // always need it for jquery plugin
	])?>
<?php RemoteModal::end(); ?>

<??>
<style>
.border-left-primary {
    border-left: .25rem solid #4e73df!important;
}
.border-left-success {
    border-left: .25rem solid #1cc88a!important;
}
.border-left-info {
    border-left: .25rem solid #36b9cc!important;
}
.border-left-warning {
    border-left: .25rem solid #f6c23e!important;
}

.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

.pb-2, .py-2 {
    padding-bottom: .5rem!important;
}
.pt-2, .py-2 {
    padding-top: .5rem!important;
}
.h-100 {
    height: 100%!important;
}
.shadow {
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e3e6f0;
    border-radius: .35rem;
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}
.no-gutters {
    margin-right: 0;
    margin-left: 0;
}
.no-gutters>.col, .no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0;
}
.mr-2, .mx-2 {
    margin-right: .5rem!important;
}
.text-xs {
    font-size: 1.4rem;
}
.text-primary {
    color: #4e73df!important;
}
.font-weight-bold {
    font-weight: 700!important;
}
.dropdown .dropdown-menu .dropdown-header, .sidebar .sidebar-heading, .text-uppercase {
    text-transform: uppercase!important;
}
.mb-1, .my-1 {
    margin-bottom: .25rem!important;
}

.text-gray-800 {
    color: #5a5c69!important;
}
.font-weight-bold {
    font-weight: 700!important;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}

.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}
.no-gutters {
    margin-right: 0;
    margin-left: 0;
}
.no-gutters>.col, .no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0;
}
.col-auto {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
}

.border-bottom-primary {
    border-bottom: .25rem solid #4e73df!important;
}
.pb-3, .py-3 {
    padding-bottom: 1rem!important;
}
.pt-3, .py-3 {
    padding-top: 1rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

</style>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <input type="text" class="form-control" value="" name="search-visit" id="search-visit" style="width:300px;margin-bottom: 10px;">        
    </div>
</div>

<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    <div class="card shadow">
    <div class="card-body">
   <div id="show-visit-data"></div>
   </div>
   </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

<!-- Earnings (Monthly) Card Example -->

  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-md-10">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">แผนก / คลินิก</div>



        </div>
        <div class="col-auto">
          <i class="fas fa-user-tag fa-2x text-gray-300"></i>
          
        </div>

        <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th width="85%">#</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach(CDepartment::find()->all() as $department):?>
        <tr>
            <td>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$department->name;?></div>
            </td>
            <td><code>0</code></td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>

      </div>
    </div>
  </div>

        
        </div>
    
    </div>
    
<?php
$url = Url::to(['/queuemanage/default/show-visit']);
$js = <<< JS
showVisit();
$('#search-visit').keyup(function(e){
    if(e.keyCode == 13){
        showVisit();
    }
});



function showVisit(){
    $.ajax({
        type: "get",
        url: "$url",
        data: {keys:$('#search-visit').val()},
        dataType: "json",
        success: function (response) {
            $('#show-visit-data').html(response.content);
        }
    });
}



JS;
$this->registerJS($js);
?>