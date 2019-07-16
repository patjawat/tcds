<?php
use yii\helpers\Html;
use app\components\PatientHelper;
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);


// $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@webroot/modules_share/foot/dist/');
?>
<div class="panel panel-info" style="margin-left: 20px;margin-right: 20px">
	<div class="panel-heading">
		<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> FOOT ASSESSMENT</h3>
	</div>
	<div class="panel-body">
		<!-- tabs -->
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">FOOT ASSESSMENT SUMMARY<span class="caret"></span></a>
					<ul class="dropdown-menu" style="width: 250px;">
						<li><a href="#summary-opd" data-toggle="tab">OPD</a></li>
						<li><a href="#summary-ipd" data-toggle="tab">IPD</a></li>
					</ul>
				</li>
				<li class="active"><a href="#complate" data-toggle="tab">FOOT ASSESSMENT RECORD COMPLATE</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">FOOT ULCER VISIT FIRST VISIT<span class="caret"></span></a>
					<ul class="dropdown-menu" style="width: 250px;">
						<li><a href="#first-opd" data-toggle="tab">OPD</a></li>
						<li><a href="#first-ipd" data-toggle="tab">IPD</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">FOOT ULCER VISIT FU VISIT<span class="caret"></span></a>
					<ul class="dropdown-menu" style="width: 250px;">
						<li><a href="#fu-opd" data-toggle="tab">OPD</a></li>
						<li><a href="#fu-ipd" data-toggle="tab">IPD</a></li>
					</ul>
				</li>

			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="complate">
					<?php //$this->render('@app/modules_share/foot/views/foot-assessment-complate/index',['model' => $model_complate,'hn' => $hn,'vn'=> $vn]);?>
				</div>
				
				<div class="tab-pane" id="4">Tpiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,
					molestie tincidunt condimentum vitae.</div>
				<div class="tab-pane" id="summary-opd">
					<?php //$this->render('@app/modules_share/foot/views/foot-assessment-summary-opd/index',['model' => $model_sm_opd,'hn' => $hn,'vn'=> $vn]);?>
				</div>
				<div class="tab-pane" id="summary-ipd">
					<?php //$this->render('@app/modules_share/foot/views/foot-assessment-summary-ipd/index',['model' => $model_sm_ipd,'hn' => $hn,'vn'=> $vn]);?>
				</div>
				<div class="tab-pane" id="first-opd">
				<?php //$this->render('@app/modules_share/foot/views/foot-ulcer-first-opd/index',['model' => $model_ufirst_opd,'hn' => $hn,'vn'=> $vn]);?>
				</div>
				<div class="tab-pane" id="first-ipd">ipd</div>
				<div class="tab-pane" id="fu-opd">opd</div>
				<div class="tab-pane" id="fu-ipd">ipd</div>
			</div>
		</div>
		<!-- /tabs -->
	</div>
</div>
<!-- Panel -->


<?php //$directoryAsset;?>