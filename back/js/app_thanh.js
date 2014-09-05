
$(document).ready(function() {
    nestable();
    $(".chosen").data("placeholder","Select Categories...").chosen();
});


function nestable() {
    if ($('#nestable').length <= 0)
        return false;
    var ele;
    var data_old;
    var parent;
    var process = 0;
    $('#nestable').nestable({
        group: 1
    }).on('change', function() {
        });
    $('#save-menu').click(function(){
        var serial = $('.dd').nestable('serialise');
        var data = {
            category:serial
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


