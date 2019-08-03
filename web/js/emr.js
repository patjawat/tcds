function LoadDocumentRQForm(){
    $.ajax({
    type: "get",
    url: "index.php?r=document%2Fdocumentqr/view-emr",
    dataType: "json",
    success: function (response) {
        $('.view-doc').html(response);
    }
});

}


function loadEmrDocument(){
    $.ajax({
        type: "get",
        url: "index.php?r=document/default/index",
        dataType: "json",
        success: function (response) {
            $('#view-document').html(response);
        }
    });
}
function loadEmrDocumentQR(){
    $.ajax({
        type: "get",
        url: "index.php?r=document/documentqr/view-emr",
        dataType: "json",
        success: function (response) {
            $('#view-document-qr').html(response);
        }
    });
}

function convertFile(hn,url,url_insert){
    $.ajax({
        type: "post",
        beforeSend: function () {
            $('.container_loadding').show();    
        },
        url:url,
        data: {hn:hn,url_insert:url_insert},
        dataType:"json",
        success: function (response) {
            if(response.prediction !==""){
                $("#loader").hide();
                localStorage.setItem("document_him",hn)
               loadEmrDocument();
               $('.container_loadding').hide();
               $('#view-document').show();
            }
        
        }
    });
}