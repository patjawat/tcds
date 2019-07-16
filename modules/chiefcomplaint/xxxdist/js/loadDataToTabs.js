$(function(){
    loadDiagnosis();
});

function loadDiagnosis(){
    $.ajax({
        type: "get",
        url:'index.php?r=doctorworkbench/pcc-diagnosis',
        // dataType: "json",
        success: function (response) {
            $('#diagnosis_show').html(response);
        }
    });

}