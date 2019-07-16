<?php
use app\modules\lab\models\LabResult;
use app\components\PatientHelper;
use app\components\FormatYear;
$hn = PatientHelper::getCurrentHn();
$loop = LabResult::find()->where(['patient_id' => $hn])->all();

?>
<style>

#lab-select > .modal-dialog{
    width:80%;
}
.table-wrap {
  overflow-x: auto;
  width: 100%;
}

.table-wrap .table {
  width: 100%;
  max-width: 100%;
}

.table tr th {
  white-space: nowrap;
}

.table-wrap {
  position: static;
}

.table__column--persistent-wrap {
  position: relative;
  border: 1px solid #f0f0f0;
}

.table__column--persistent {
  background-color: #ffffff;
  position: absolute;
  top: 0;
  left: 0;
  display: inline-block;
  width: auto;
  z-index: 4;
}

/* ------- Presentational Formatting --------- */
* {
  font-family: Arial, Helvetica, sans-serif;
}
h1 {
  text-align: center;
}
.center {
  margin: 0 auto;
  width: 100%;
}

.table {
  border-collapse: collapse;
}

.table tr {
  border-bottom: 1px solid #f0f0f0;
}

.table thead tr {
  border-bottom: 2px solid #f0f0f0;
}

.table tr td,
.table tr th {
  padding: .5em;
  border-right: 1px solid #f0f0f0;
}

.table th {
  text-align: left;
}
</style>
<section class="center">
  <div class="table__column--persistent-wrap">
    <div class="table-wrap">
      <table class="table" summary="This is a summary of your rad table contents.">
        <thead>
       
          <tr>
            <th scope="row">รหัสผลตรวจ</th>
            <th scope="col">รหัสการตรวจของ LIS</th>
            <?php foreach ($loop as $key => $value):?>
            <th scope="col"><?=FormatYear::toThai($value->checkin_date);?></th>
            <?php endforeach;?>
          </tr>
         
        </thead>
        <tbody>
        <?php  foreach ($data as $key => $model):?>
          <tr>
            <th scope="row"><?=$model['lis_code'];?></th>
            <th scope="row"><?=$model['test'];?></th>
            <?php foreach ($loop as $key => $value):?>
            <td width="300"><?=$value->result;?></td>
            <?php endforeach;?>
           
          </tr>
          <?php  endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php
$js = <<< JS

function cloneTables(tables) {
  tables.each(function () {
    var table = $(this);
    var persistentColumn = table
      .clone()
      .insertBefore($(table).parent())
      .addClass('table__column--persistent');
    persistentColumn.find('th:not(:first-child),td:not(:first-child)')
      .remove();
    equalizeRowHeights(table, persistentColumn, false);
  });
}

function equalizeRowHeights(fullTable, singleColumn, stopRecursion) {
  singleColumn.find('tr')
      .each(function (i, elem) {
            $(this).height(fullTable.find('tr:eq(' + i + ')').height());
        });
  if (!stopRecursion) {
    $(window).resize(function() {
      equalizeRowHeights(fullTable, singleColumn, true);
    });
  }
}

$(function() {
    cloneTables($('.table-wrap .table'));
});

JS;
$this->registerJS($js);

?>