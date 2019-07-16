
    $('.p-menu').click(function (e) { 
        saveDepartment();
        
    });


    $("#contactForm").submit(function(e) {
        // prevent default submit behaviour 
        e.preventDefault();
        // serialize total form data
        
    });

    function saveDepartment(){
        $.ajax({
            type: "post",
            // beforeSend:function(){
            //     $('#vs').html('<div class="stage"><div class="dot-pulse"></div></div>')
            //     $('.form-group-vs').hide();
            // },
            url: "index.php?r=settings/department/create",
            dataType: "json",
            data:$('#form-form-department').serialize(),
            success: function (response) {
                // $('#vs').html(response)
                // loadVs();
            }
        });
    }