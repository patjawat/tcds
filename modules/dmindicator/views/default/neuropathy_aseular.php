<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- start panel -->
        <div class="panel panel-success shadow">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <p class="pull-left">ทำมาแล้วเมื่อ <code>ทำมาแล้วเมื่อ 11 วัน 12 เดือน 2 ปี </code></p>
                    <p class="pull-right"><i class="fas fa-calendar"></i> 20/08/2562</p>
                    <br>
                </h3>
            </div>
            <div class="panel-body">

            <div id="NeuropathyAseular1"></div>

            </div>
        </div>
        <!-- End panel -->

    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- start panel -->
        <div class="panel panel-success shadow">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <p class="pull-left">ทำมาแล้วเมื่อ <code>ทำมาแล้วเมื่อ 11 วัน 12 เดือน 2 ปี </code></p>
                    <p class="pull-right"><i class="fas fa-calendar"></i> 20/08/2562</p>
                    <br>
                </h3>
            </div>
            <div class="panel-body">

                <div id="NeuropathyAseular2"></div>

            </div>
        </div>
        <!-- End panel -->
    </div>
</div>


<?php
$js  = <<< JS

LastNeuropathyAseular1();
LastNeuropathyAseular2();

function LastNeuropathyAseular1(){
    $.ajax({
    type: "get",
    url: "index.php?r=dmindicator/dmindicators/neuropathy-aseular",
    dataType: "json",
    success: function (response) {
        $('#NeuropathyAseular1').html(response);
    }
});
}

function LastNeuropathyAseular2(){
    $.ajax({
    type: "get",
    url: "index.php?r=dmindicator/dmindicators/neuropathy-aseular",
    dataType: "json",
    success: function (response) {
        $('#NeuropathyAseular2').html(response);
    }
});
}


JS;
$this->registerJS($js);
?>