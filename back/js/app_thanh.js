
$(document).ready(function() {
    nestable();
    init_js();
    bind_user();
    $(".chosen").data("placeholder", "Select Categories...").chosen();
});

function bind_user() {
    $("#users .ban").on('click', function() {
        var ele = $(this);
        var parent = ele.parents('tr');
        var disabled = 0;
        if (ele.prop('checked') == false) {
            bootbox.confirm("Do you want to Ban this Customer?", function(result) {
                if (result)
                    disabled = 1;

            });
        }
        else {
            bootbox.confirm("Do you want to UnBan this Customer?", function(result) {
                if (!result)
                    disabled = 1;

            });
        }
        var data = {
            disabled: disabled
        }


        $.get(ele.attr('data-url'), data, function(data) {

        }, 'json');
        return true;
    });

}

function init_js() {

    $("table .delete-row").click(function() {

        var ele = $(this);
        bootbox.confirm("Do you want to delete this?", function(result) {
            if (result) {

                $.get(ele.attr('href'), "", function() {
                    ele.parents("tr").fadeOut('slow');
                });


            }
        });
        return false;

        //        var ele = $(this);
        //        $.get(ele.attr('href'),"",function(){
        //            ele.parents("tr").fadeOut('slow');
        //        });
        //        return false;
    });

    $('.dd-handle a').on('mousedown', function(e) {
        e.stopPropagation();
    });
    $('.category-delete').on('click', function() {
        var ele = $(this);

        bootbox.confirm("Do you want to delete this?", function(result) {
            if (result) {
                $.get(ele.attr('href'), "", function() {
                    ele.closest(".dd-item").fadeOut('slow', function() {
                        ele.closest(".dd-item").remove();
                    });
                });

            }
        })
        return false;
    });

}


function nestable() {
    if ($('#nestable').length <= 0)
        return false;
    var ele;
    var data_old;
    var parent;
    var process = 0;
    console.log('aaaa');
    $('#nestable').nestable({
        group: 1
    }).on('change', function() {
    });
    $('#save-menu').click(function() {
        var serial = $('.dd').nestable('serialise');
        var data = {
            category: serial
        }
        var url = baseUrl + "category/doCatetory"
        process = 0;
        $.post(url, data, function(respone) {

        });
        return false;

    });


    var updateOutput = function(e)
    {
        var list = e.length ? e : $(e.target),
                output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    // activate Nestable for list 1

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
                action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
}


