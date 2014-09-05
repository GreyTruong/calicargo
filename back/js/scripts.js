
(function($){

    "use strict";
    $(document).ready(function() {
        /*******Form Validator***********/
        $('#order').bootstrapValidator(order_validate_options);

        $(".delete-row").click(function(){
        var id = $(this).attr("id");
        $('#tobe-deleted').val(id);
        $('#myModal').modal();
        });

        $("#delete_out_record").click(function(){
            var id = $("#tobe-deleted").val();
            var url = window.location.href;
            var url = url.replace('outcome-management', 'outcome-delete' + '/' + id);
            $.ajax({
                url: url,
                type: "POST",
                data: {},
                context: document.body
            }).done(function(data) {
                $("#row" + id).hide();
                $('#myModal').modal('hide');
                
            })
            .error(function(){

            });
        });

    //Outcome form validation
    $('.outcome-form').bootstrapValidator({
        message: 'This value is not valid',   
        fields: {
            type:{
                message: 'Outcome type is invalid',
                validators: {
                    notEmpty: {
                        message: 'Outcome type is required and cannot be empty'
                    }
                }
            },
            value: {
                validators: {
                    notEmpty: {
                        message: 'The value is required and must be a valid number'
                    },
                    between: {
                        min: 0,
                        max: 100000000000000000000000000,
                        message: 'The number must be >= 0'
                    }
                }
            },
        }
    }).on('success.form.bv', function(e) {
    // Prevent form submission
    e.preventDefault();

    // Get the form instance
    var $form = $(e.target);
    // Get the BootstrapValidator instance
    var bv = $form.data('bootstrapValidator');

    var form_id = $form.attr("id");
    // Format form data
    var arrayData = $('form#' + form_id).serializeArray();
    var objectData = {};
    $.each(arrayData, function() {
        var value;
        if (this.value != null) {
            value = this.value;
        } else {
            value = '';
        }
        if (objectData[this.name] != null) {
            if (!objectData[this.name].push) {
                objectData[this.name] = [objectData[this.name]];
            }
            objectData[this.name].push(value);
        } else {
            objectData[this.name] = value;
        }
    });

    if(form_id=='add_outcome'){
        var url = "";            
        $.ajax({
            url: url,
            type: "POST",
            data: {info : objectData},
            context: document.body
        }).done(function(data) {
            $("#success-notification").show();					
            $('html,body').animate({
                scrollTop: $("#success-notification").offset().top
            });
        })
        .error(function(){
            $("#failure-notification").show();
        });
    }
    else if(form_id == 'update_outcome'){            	
        var edit_url = ''
        $.ajax({
            url: edit_url,
            type: "POST",
            data: {info : objectData},
            context: document.body
        }).done(function(data) {
            $("#success-notification").show();					
            $('html,body').animate({
                scrollTop: $("#success-notification").offset().top
            });

        })
        .error(function(){
    //$("#failure-notification").show();
    //$('form#shipping_form_ups').reset();
    });
    }            

    });

/*******End of Form Validator****/
});
})(jQuery);
