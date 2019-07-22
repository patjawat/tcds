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

function convertFile(hn,url){
    $.ajax({
        type: "post",
        beforeSend: function () {
            // $('#view-document').hide();
            $('.container_loadding').show();    
        },
        url:url,
        data: {hn:hn},
        dataType: "่json",
        success: function (response) {
            if(response.prediction !==""){
                $("#loader").hide();
                // $('#emr-content').show()
                localStorage.setItem("document_him",hn)
               loadEmrDocument();
               $('.container_loadding').hide();
               $('#view-document').show();
            }
            console.log(response)
        
        },
        fail: function(xhr, textStatus, errorThrown){
       alert('request failed');
    }
    });
}