<?php

use app\components\UnitHelper;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $model app\modules\chiefcomplaint\models\Pccservicepi */

$this->params['breadcrumbs'][] = ['label' => 'Pccservicepis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.card {
    border: none;
    -webkit-box-shadow: 0 0 35px 0 rgba(154, 161, 171, .15);
    box-shadow: 0 0 35px 0 rgba(154, 161, 171, .15);
    margin-bottom: 30px;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem;
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
    border: 1px solid #e3eaef;
    border-radius: .25rem;
    box-shadow: 0px 2px 35px 0 rgba(154, 161, 171, 0.28);
    margin-bottom: 30px;
}
</style>

<div class="card box-shadow">
    <div class="card-body">

        <table class="table">
<tr>
<td colspan="2" style="background-color: #eee;"> <i class="fas fa-heartbeat animated infinite bounceIn delay-2s" style="color: #b11313;
    font-size: 24px;"></i> VITAL SIGNS AND CONTOUR OF PATIENT</td>
</tr>
            <tr>
                <td scope="row">BT </td>
                <td>
                    <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bt',
    'name' => 'bt',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'อุณหภูมิร่างกาย',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'อุณหภูมิร่างกาย...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);?> C &nbsp;<code id="bt_f"><?=UnitHelper::getCToF($model->bt);?></code> &nbsp;F
                </td>
            </tr>

            <tr>
                <td scope="row">BP</td>
                <td> <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bp1',
    'name' => 'bp1',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ความดันโลหิตบน',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ความดันโลหิตบน...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                    / <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bp2',
    'name' => 'bp2',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ความดันโลหิตล่าง',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ความดันโลหิตบ่าง...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                    mmHg</td>
            </tr>

            <tr>
            <td>Position</td>
            <td><?=$model->position;?></td>
            </tr>

            <tr>
            <td>Arm</td>
            <td><?=$model->arm;?></td>
            </tr>

<tr>
            <td>PR Rhythm</td>
            <td><?=$model->pr_rhythm?></td>
            </tr>
            <tr>
<td>PR</td>
<td>
<?=Editable::widget([
    'model' => $model,
    'attribute' => 'pr',
    'name' => 'pr',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'จังหวะของชีพจร',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'จังหวะของชีพจร...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                        /min
</td>
</tr>


            <tr>
            <td>O2Sat</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'o2sat',
    'name' => 'o2sat',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ความเข้มข้นของออกซิเจน',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ความเข้มข้นของออกซิเจน...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>
                        %
            </td>
            </tr>

            <tr>
            <td>WC</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'wc',
    'name' => 'wc',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบเอว',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบเอว...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                        cm
                            <code id="wc_in"><?=UnitHelper::getCmToIn($model->wc);?></code> In
                
                </td>
            </tr>

            <tr>
            <td>IC</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ic',
    'name' => 'ic',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบอกขณะหายใจเข้า',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบอกขณะหายใจเข้า...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                          cm
                            <code id="ic_in"><?=UnitHelper::getCmToIn($model->ic);?></code> In
            </td>
            </tr>

            <tr>
            <td>EC</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ec',
    'name' => 'ec',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบอกขณะหายใจออก',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบอกขณะหายใจออก...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                           cm
                            <code id="ec_in"><?=UnitHelper::getCmToIn($model->ec);?></code> In
            </td>
            </tr>

            <tr>
            <td>HC</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'hc',
    'name' => 'hc',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบศีรษะ',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบศีรษะ...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                          cm
                            <code id="hc_in"><?=UnitHelper::getCmToIn($model->hc);?></code> In
            </td>
            </tr>

            <tr>
            <td>BW</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bw',
    'name' => 'wb',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'น้ำหนัก',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'น้ำหนัก...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>
                           kg
                            <code id='bw_lb'><?=round(UnitHelper::getKgToLb($model->bw), 2);?></code> lb
            </td>
            </tr>

            <tr>
            <td>HT</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ht',
    'name' => 'ht',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ส่วนสูง',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ส่วนสูง...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>
                        cm
                            <code id="ht_f"><?=UnitHelper::getCmToFt($model->ht);?></code> Ft
            </td>
            </tr>

            <tr>
            <td>IBW</td>
            <td>
            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ibw',
    'name' => 'ibw',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'IBW',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'IBW...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                        kg
            </td>
            </tr>

        </table>


    </div>
</div>