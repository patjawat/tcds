function medCancel(id,url1){
    // $.ajax({
    //     type: "post",
    //     url: url1,
    //     data:{id:id},
    //     dataType: "json",
    //     success: function (res) {
    //         if(res){
    //             // $.pjax.reload({container:'#med-accept-pjax',url:$resUrl});
    //             // $.pjax.reload({url:'index.php?r=med/default/accept-view&id=190812172625', container: '#med-accept-pjax', push: false, replace: true});
    //             $.pjax.reload({url:res.url, container: res.forceReload, push: true, replace: true});
    //         }
            
    //     }
    // });
    // return false;
}

function meddAcceptSavel(id,url1){
    $.ajax({
        type: "post",
        url: url1,
        data:{id:id},
        dataType: "json",
        success: function (res) {
            if(res){
                // $.pjax.reload({container:'#med-accept-pjax',url:$resUrl});
                // $.pjax.reload({url:'index.php?r=med/default/accept-view&id=190812172625', container: '#med-accept-pjax', push: false, replace: true});
                $.pjax.reload({url:res.url, container: res.forceReload, push: true, replace: true});
            }
            
        }
    });
    return false;
}

$('#med-accept-save').click(function (e) { 
    e.preventDefault();
    // var datas = $("#grid-med-accept")
    // console.log(datas);
    var grid = $("#grid-med-accept");
    var data = grid.attr('id');
    var keys = [];
    if (data.selectionColumn) {
    //     $grid.find("input[name='" + data.selectionColumn + "']:checked").each(function () {
    //         keys.push($(this).parent().closest('tr').data('key'));
    //     });
    console.log(select);
    }
    // return keys;
    console.log(grid);

    
});