
function loadDrugitems(value) {
    $.ajax({
        type: "get",
        url: "index.php?r=drug/drugitems/items",
        beforeSend: function () {
            $('.modal-title').html('Loadding...');
            // $('.show-drugitems-data').html('<img src="img/loading2.gif" style="]margin-left: 40%;margin-top: 2%;padding-bottom: 6%;width: 20%;" />');
        },
        data: { keys: value },
        dataType: 'json',
        success: function (response) {
            $('.modal-title').html(response.title);
            $('.show-items').html(response.content)
        }
    });
}

function loadMedication(value) {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/medication/index",
        data: { keys: value },
        dataType: 'json',
        success: function (response) {
            $('#view_medication').html(response);

        }
    });
}

function loadMedicationForm(value) {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/medication/create",
        data: { keys: value },
        dataType: 'json',
        success: function (response) {
            $('#medication-form').html(response);
        }
    });
}


function loadMedHistoryItems() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/medication/med-history-items",
        // data:{keys:value},
        dataType: 'json',
        success: function (response) {
            $('.show-data').html(response.content);
        }
    });
    // alert();
}



function loadDiagnosis() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/diagnosis",
        dataType: 'json',
        success: function (response) {
            $('#tab_diagnosis').html(response);
        }
    });
}

function loadDiagnosisitems(value) {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/diagnosis/items",
        beforeSend: function () {
            $('.modal-title').html('Loadding...');
            // $('.show-drugitems-data').html('<img src="img/loading2.gif" style="]margin-left: 40%;margin-top: 2%;padding-bottom: 6%;width: 20%;" />');
        },
        data: { keys: value },
        dataType: 'json',
        success: function (response) {
            $('.modal-title').html(response.title);
            $('.show-items').html(response.content)
        }
    });
    // alert('loaddiag items');
}

function loadDiagnosisHistory() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/diagnosis/history",
        beforeSend: function () {
            $('.modal-title').html('Loadding...');
            // $('.show-drugitems-data').html('<img src="img/loading2.gif" style="]margin-left: 40%;margin-top: 2%;padding-bottom: 6%;width: 20%;" />');
        },
        // data:{keys:value},
        dataType: 'json',
        success: function (response) {
            $('.modal-title').html(response.title);
            $('.history').html(response.content)
        }
    });
    // alert('loaddiag items');
}

function loadMedicationHistory() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/medication/history",
        beforeSend: function () {
            $('.modal-title').html('Loadding...');
            // $('.show-drugitems-data').html('<img src="img/loading2.gif" style="]margin-left: 40%;margin-top: 2%;padding-bottom: 6%;width: 20%;" />');
        },
        // data:{keys:value},
        dataType: 'json',
        success: function (response) {
            $('.modal-title').html(response.title);
            $('.history').html(response.content)
        }
    });
    // alert('loaddiag items');
}

function loadChiefcomplaint() {
    var unit = localStorage.getItem("unit");
    var temperature = localStorage.getItem("temperature");
    var bw = localStorage.getItem("bw");
    $.ajax({
        type: "get",
        url: "index.php?r=chiefcomplaint/chiefcomplaint/doctor-view",
        data: {
            unit: unit,
            temperature: temperature,
            bw: bw
        },
        dataType: 'json',
        success: function (response) {
            $('#chiefcomplaint').html(response);
        }
    });
}


// อัตราค่าบริการค่าแพทย์
function loadDf() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/df",
        success: function (response) {
            $('#view_df').html(response);
            $('#df_code').select();
            loadSumDf();
        }
    });
}

function loadFormDf() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/df/create",
        success: function (response) {
            $('#form_df').html(response);

        }
    });
}

function loadSumDf() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/df/sum",
        success: function (response) {
            $('#sum_df').html(response);

        }
    });
}

function loadFormEyeExamToday() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/eye-exam-today/create",
        success: function (response) {
            $('#form_eye-exam-today').html(response);

        }
    });
}

function loadEyeExamToday() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/eye-exam-today",
        success: function (response) {
            $('#eye-exam-todayf').html(response);

        }
    });
}




// ตรวจสอบสถานะยืนยันไม่จ่ายยา
function loadNomedStatus() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/medication/check-nomed-status",
        dataType: "json",
        success: function (response) {
            if (response.no_med == "Y") {
                $('#medication-no_med').attr('checked', true);
                $("#icode").prop("disabled", true);
                $("#qty").prop("disabled", true);
                $("#druguse").prop("disabled", true);
            } else {
                $('#medication-no_med').attr('checked', false);
                $("#icode").prop("disabled", false);
                $("#qty").prop("disabled", false);
                $("#druguse").prop("disabled", false);
            }
            if (response.count > 0) {
                $('#medication-no_med').attr("disabled", true);

            }
            // console.log(response);
        }
    });
}

// ################ End


function getCToF() {
    $.ajax({
        type: "get",
        url: "index.php?r=chiefcomplaint/chiefcomplaint/getcf",
        data: "data",
        dataType: "json",
        success: function (response) {
            $('#bt_f').html(response.bt)
            $('#bw_lb').html(response.bw)
            $('#ht_f').html(response.ht)
            $('#wc_in').html(response.wc)
            $('#ic_in').html(response.ic)
            $('#ec_in').html(response.ec)
            $('#hc_in').html(response.hc)
            $('#bmi').html(response.bmi)


        }
    });
}

// ตรวจสองแพทย์เจ้าของไข้
function doctorOf() {
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/default/doctor-of",
        dataType: "json",
        success: function (response) {
            console.log(response.status)
            if (response.status == false) {
                $.confirm({
                    title: 'ยืนยันเป็นแพทย์เจ้าของไข้!',
                    content: 'บันทึกข้อมูล!',
                    theme: 'modern',
                    buttons: {
                        confirm: function () {
                            DoctorOfConfirm();
                        },
                        cancel: function () {
                            // location.reload();
                            $.alert('Canceled!');
                                // window.location.href = 'index.php?r=doctorworkbench/default/clear-helper';
                        },
                    }
                });
            }
        }
    });
}

// ยืนยันการเปลี่ยนแพทย์เจ้าของไข้
function DoctorOfConfirm(){
    $.ajax({
        type: "post",
        url: "index.php?r=doctorworkbench/default/doctor-of-confirm",
        dataType: "json",
        success: function (response) {
            // location.reload();
        }
    });
}



