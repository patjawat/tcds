function getRequester(formId){
    // e.preventDefault();
    $.ajax({
        type: "post",
        url: "index.php?r=requester/confirm",
        data:{formId:formId},
        dataType: "json",
        success: function (response) {
            $('#main-modal').modal('show');
            $('.modal-title').html(response.title);
            $('.modal-body').html(response.content);
            $('.modal-footer').html(response.footer);
        }
    });
}