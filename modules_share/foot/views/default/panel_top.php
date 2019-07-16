<?php
use yii\helpers\Html;
// $this->title = 'ULCER VISIT FIRST VISIT IPD';
// $this->params['breadcrumbs'][] = ['label' => 'FOOT', 'url' => ['/foot/default/index']];
// $this->params['breadcrumbs'][] = ['label' => 'SUMMARY-OPD', 'url' => ['/foot/foot-assessment-summary-opd']];
// $this->params['breadcrumbs'][] = ['label' => 'SUMMARY-IPD', 'url' => ['/foot/foot-assessment-summary-ipd']];
// $this->params['breadcrumbs'][] = ['label' => 'COMPLATE', 'url' => ['/foot/foot-assessment-complate']];
// $this->params['breadcrumbs'][] = ['label' => 'ULCER VISIT FIRST VISIT OPD', 'url' => ['/foot/foot-ulcer-first-opd']];
// $this->params['breadcrumbs'][] = ['label' => 'ULCER VISIT FIRST VISIT IPD', 'url' => ['/foot/foot-ulcer-first-ipd']];
// $this->params['breadcrumbs'][] = ['label' => 'ULCER VISIT FU VISIT OPD', 'url' => ['/foot/foot-ulcer-fu-opd']];
// $this->params['breadcrumbs'][] = ['label' => 'ULCER VISIT FU VISIT IPD', 'url' => ['/foot/foot-ulcer-fu-ipd']];
// $this->params['breadcrumbs'][] = $this->title;


?>
<style>
.navbar-default .navbar-nav > li.dropdown:hover > a, 
.navbar-default .navbar-nav > li.dropdown:hover > a:hover,
.navbar-default .navbar-nav > li.dropdown:hover > a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}
li.dropdown:hover > .dropdown-menu {
    display: block;
	background-color: #eee;
}
.nav-tabs > li {
    background-color: #d9edf7;
}
.nav-tabs > li > a {
    color:#353535;
}
</style>
<h4>FOOT ASSESSMENT</h4>
<!-- <div class="panel panel-info" style="margin-left: 20px;margin-right: 20px">
	<div class="panel-heading">
		<div class="panel-title"><span class="fa fa-wheelchair"></span> FOOT ASSESSMENT</div>
	</div>
	<div class="panel-body"> -->
		<!-- tabs -->
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="<?=$tabimage;?>">
				<?php echo Html::a('<i class="fas fa-camera-retro" aria-hidden="true"></i> FOOT IMAGE',['/foot/default/foot-image'])?>
				</li>
				<li class="<?=$tabsummary;?>">
				<?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> SUMMARY',['/foot/foot-assessment-summary-opd'])?>
				</li>
				<!-- <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-check-square" aria-hidden="true"></i> OPD SUMMARY<span class="caret"></span></a>
					<ul class="dropdown-menu" style="width: 250px;">
					<li><?php//Html::a('<i class="fa fa-check-square-o" aria-hidden="true"></i> OPD',['/foot/foot-assessment-summary-opd'])?></li>
					<li><?php//Html::a('<i class="fa fa-check-square-o" aria-hidden="true"></i> IPD',['/foot/foot-assessment-summary-ipd'])?></li>
					</ul>
				</li> -->
				<!-- <li > -->
				<li class="<?=$tabfirst;?>">
				<?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> ULCER FIRST VISIT',['/foot/foot-ulcer-first-opd'])?>
				</li>
				<!-- <li class="dropdown <?php //$tabfirst;?>">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-check-square" aria-hidden="true"></i> OPD ULCER FIRST VISIT<span class="caret"></span></a>
					<ul class="dropdown-menu" style="width: 250px;">
					<li><?php //Html::a('<i class="fa fa-check-square-o" aria-hidden="true"></i> OPD',['/foot/foot-ulcer-first-opd'])?></li>
					<li><?php //Html::a('<i class="fa fa-check-square-o" aria-hidden="true"></i> IPD',['/foot/foot-ulcer-first-ipd'])?></li>
					</ul>
				</li> -->
				<!-- <li class="dropdown <?php //$tabfu;?>">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-check-square" aria-hidden="true"></i> OPD ULCER F/U VISIT<span class="caret"></span></a>
					<ul class="dropdown-menu" style="width: 250px;">
					<li><?php //Html::a('<i class="fa fa-check-square-o" aria-hidden="true"></i> OPD',['/foot/foot-ulcer-fu-opd'])?></li>
					<li><?php //Html::a('<i class="fa fa-check-square-o" aria-hidden="true"></i> IPD',['/foot/foot-ulcer-fu-ipd'])?></li>
					</ul>
				</li> -->
				<li class="<?=$tabfu;?>">
				<?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> ULCER F/U VISIT',['/foot/foot-ulcer-fu-opd'])?>
				</li>
				<li class="<?=$tabcomplate;?>"><?=Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> COMPLATE RECORD',['/foot/foot-assessment-complate'])?></li>
				</li>

				</li>
			</ul>
			<div class="tab-content">

