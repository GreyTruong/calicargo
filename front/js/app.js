
$(document).ready(function() {
    nestable();
    init_js();
    bind_user();
    // bind_category();
    get_child_category();
   
    ckeditor();
    edit_category();
    dropzone();
    about();
    add_category();
    colorBox();
    remove_image();
    remove_color();
    page();
    language();
    form_submit();
    
    $(".chosen").data("placeholder","Select Frameworks...").chosen();
    
});

function validate(obj){
    var error = 0;
    var obj_input = $('input.require',obj);
    error = for_validate_input(obj_input) + error;
    var obj_ckeditor = $('ckeditor.require',obj);
    error = for_validate_ckeditor(obj_ckeditor) + error;
    return error;
}
function for_validate_ckeditor(obj){
    var error = 0;
    $.each( obj, function( key, value ) {
       
        var ele = $(this);
        
        var content = CKEDITOR.instances[$(this).attr('id')].getData();
        if(content==''){
            var group = ele.closest('.form-group');
            group.addClass('has-error');
            error ++;
        }
        
    });
    return error;
}
function for_validate_input(obj){
    var error = 0;
    $.each( obj, function( key, value ) {
       
        var ele = $(this);
        if(ele.val()==''){
            var group = ele.closest('.form-group');
            group.addClass('has-error');
            error ++;
        }
    });
    return error;
}

function form_submit(){
    $('form.form-validate').submit(function(e){
        var ele = $(this);
        var check_validate = validate(ele);
        if(check_validate > 0)
            return false;
    });
}

function language(){
    $('.language-default input').click(function(){
        var ele = $(this);
        
        if(ele.hasClass('checked'))
            return false;
         
        bootbox.confirm("Bạn có muốn chọn ngôn ngữ này làm ngôn ngữ mặc định?", function(result) {
            if (result) {
               
                var id = ele.attr('data-id');
                //var li = ele.closest('li');
                var data = {
                    id:id
                };
                var url = baseUrl+'language/changedefault';
                $.post(url,data,function(respone){
                    $('.language-default input').removeClass('checked');
                    ele.addClass('checked');
                });
            
            }
            else{
                ele.attr('checked',false);
                var get_checked = $('.language-default input.checked').prop('checked', true);
                console.log(get_checked);
            // console.log(ele);
            }
        
           
        });
        
    })
}

function remove_image(){
    $('.remove-image').on('click',function(){
        var ele = $(this);
        bootbox.confirm("Bạn có muốn xóa Hình này?", function(result) {
            if (result) {
               
                var id = ele.attr('data-id');
                var li = ele.closest('li');
                var data = {
                    id:id
                };
                var url = baseUrl+'item/removeImage';
                $.post(url,data,function(respone){
                    li.fadeOut('slow');
                });
                
            
            }
        });
        return false;
    //        var cf = confirm("Bạn có chắc muốn xóa dữ liệu này?");
    //        if(!cf) 
    //            return false;
    //        var ele = $(this);
    //        var id = ele.attr('data-id');
    //        var li = ele.closest('li');
    //        var data = {
    //            id:id
    //        };
    //        var url = baseUrl+'item/removeImage';
    //        $.post(url,data,function(respone){
    //            li.fadeOut('slow');
    //        });
    //        return false;
    });
}

function remove_color(){
    $('.remove-color').on('click',function(){
        var ele = $(this);
        bootbox.confirm("Bạn có muốn xóa Màu này?", function(result) {
            if (result) {
               
                var id = ele.attr('data-id');
                var li = ele.closest('li');
                var data = {
                    id:id
                };
                var url = baseUrl+'item/removeColor';
                $.post(url,data,function(respone){
                    li.fadeOut('slow');
                });
            }
        });
        return false;
        
    //        var cf = confirm("Bạn có chắc muốn xóa dữ liệu này?");
    //        if(!cf) 
    //            return false;
    //        var ele = $(this);
    //        var id = ele.attr('data-id');
    //        var li = ele.closest('li');
    //        var data = {
    //            id:id
    //        };
    //        var url = baseUrl+'item/removeColor';
    //        $.post(url,data,function(respone){
    //            li.fadeOut('slow');
    //        });
    //        return false;
    });
}

function colorBox(){
    jQuery(function($) {
        var $overflow = '';
        var colorbox_params = {
            rel:'colorbox-image',
            reposition:true,
            scalePhotos:true,
            scrolling:false,
            previous:'<i class="ace-icon fa fa-arrow-left"></i>',
            next:'<i class="ace-icon fa fa-arrow-right"></i>',
            close:'&times;',
            current:'{current} of {total}',
            maxWidth:'100%',
            maxHeight:'100%',
            onOpen:function(){
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed:function(){
                document.body.style.overflow = $overflow;
            },
            onComplete:function(){
                $.colorbox.resize();
            }
        };
        colorbox_params.rel = 'colorbox-image';
        $('.ace-thumbnails [data-rel="colorbox-image"]').colorbox(colorbox_params);
        colorbox_params.rel = 'colorbox-color';
        $('.ace-thumbnails [data-rel="colorbox-color"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange'></i>");
    });
}
function about(){
    $('.btn-submit-about').click(function(){
        
        var ele = $(this);
        var lang = ele.attr('data-id');
        
        var url =baseUrl+'about/submit';
        var content = CKEDITOR.instances['ckeditor-'+lang].getData();
       
        var data = {
            content_editor:content
        }
        
        var options = { 
            success:function(result){
            
            },  // post-submit callback 
 
            // other available options: 
            data:data,
            url:       url,         // override for form's 'action' attribute 
            type:      'post',        // 'get' or 'post', override for form's 'method' attribute 
            dataType:  'json'      // 'xml', 'script', or 'json' (expected server response type) 

        }; 
        
        $('#form-about-'+lang).ajaxSubmit(options); 
       
    });
}


function page(){

    $('.btn-submit-page').click(function(){
        
        var ele = $(this);
        var lang = ele.attr('data-id');
        
        var url =baseUrl+'home/submitpage';
        var content = CKEDITOR.instances['ckeditor-'+lang].getData();
       
        var data = {
            content_editor:content
        }
        var options = { 
            success:function(){
                conson.log('cccc');
                //display_form_success(ele);
                conson.log('bbbb');
            },  // post-submit callback 
 
            // other available options: 
            data:data,
            url:       url,         // override for form's 'action' attribute 
            type:      'post',        // 'get' or 'post', override for form's 'method' attribute 
            dataType:  'json'      // 'xml', 'script', or 'json' (expected server response type) 

        }; 
        $('#form-about-'+lang).ajaxSubmit(options); 
       
    });
}

function dropzone() {
    if($('.dropzone').length <= 0 )
        return false;
    Dropzone.autoDiscover = false;
    //console.log('aaaa');
    $("#dropzone-image").dropzone({ 
        //        url: baseUrl+"item/uploadImage/id/" ,
        autoProcessQueue:false,
        addRemoveLinks: true,
        maxFilesize: 10,
        parallelUploads: 10,
        init: function() {
            var submitButton = $("#submit-upload-image");
            var submitRemove = $("#submit-remove-image");
            var myDropzone = this; // closure

            submitButton.on("click", function() {
                myDropzone.processQueue(); // Tell Dropzone to process all queued files.
            });
            submitRemove.on("click", function() {
                myDropzone.removeAllFiles(true); // Tell Dropzone to process all queued files.
            });

            // You might want to show the submit button only when 
            // files are dropped here:
 
            this.on("success", function (file,response) {
                
                $('#dropzone-image .dz-remove').hide();
                var response = JSON.parse(response);
                $('.list-product-image').append(response.html);
                $('.remove-image').off('click');
                remove_image();
               
            });

        }
    });
    
    $("#dropzone-color").dropzone({ 
        //        url: baseUrl+"item/uploadImage/id/" ,
        autoProcessQueue:false,
        addRemoveLinks: true,
        maxFilesize: 10,
        parallelUploads: 10,
        init: function() {
            var submitButton = $("#submit-upload-color")
            var myDropzone = this; // closure

            submitButton.on("click", function() {
                myDropzone.processQueue(); // Tell Dropzone to process all queued files.
            });

            // You might want to show the submit button only when 
            // files are dropped here:
            this.on("addedfile", function() {
                // Show submit button here and/or inform user to click it.
                });
            this.on("success", function (file,response) {
                
                $('#dropzone-color .dz-remove').hide();
                var response = JSON.parse(response);
                $('.list-product-color').append(response.html);
                $('.remove-color').off('click');
                remove_color();
               
            });

        }
    });
    
    
}
function edit_category() {
//    $('.edit-category').click(function() {
//        var ele = $(this);
//        var id = ele.attr('data-id');
//        var data = {
//            id:id
//        };
//        var url = baseUrl+'category/getEdit';
//        $.post(url,data,function(response){
//            
//            });
//        
//    //        var slug = ele.attr('data-slug');
//    //        var parent = ele.closest('.dd-handle');
//    //        var text = $('.category-title', parent).text();
//    //        $('#form-edit-category .category-id').val(id);
//    //        $('#form-edit-category .category-title').val(text);
//    //        $('#form-edit-category .category-slug').val(slug);
//
//    });
}

function add_category(){
    $('.category-add-title').focusout(function(){
        var ele = $(this);
        var parent = ele.closest('.lang-field');
        
        var slug = $('.category-add-slug',parent);
        var title = ele.val();
        var data = {
            title:title
        };
        var url = baseUrl+"category/createSlug";
        $.post(url,data,function(reponse){
            slug.val(reponse.slug);
        },'json')
        
        
    })
}

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
function ckeditor() {
    // var full_editor = CKEDITOR;
    if ($('.full-ckeditor').length > 0)
    {
        $(function() {
            $('.full-ckeditor').each(function() {
                CKEDITOR.replace($(this).attr('id'), {
                    toolbar: [
                    ['Styles', 'Format', 'Font', 'FontSize'],
                    '/',
                    ['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', 'PasteFromWord', 'Find', 'Replace', '-', 'Outdent', 'Indent', '-', 'Print'],
                    '/',
                    ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source', '-', 'Maximize']
                    ]
                });

            });
        });
       
    }

    if ($('.mini-editor').length > 0)
        $(function() {
            $('.mini-editor').each(function() {
                CKEDITOR.replace($(this).attr('id'), {
                    toolbar: [
                    ['Styles', 'Format', 'Font', 'FontSize'],
                    '/',
                    ['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', 'PasteFromWord', 'Find', 'Replace', ],
                    '/',
                    ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                    ['Maximize']
                    ]
                });

            });
        });





}
function get_child_category() {
    $('.category-parent').change(function() {
        var ele = $(this);
        var id = $('option:selected', ele).val();
        var data = {
            id: id
        }
        var url = baseUrl + 'category/getchild/id/' + id;
        $.post(url, data, function(result) {
            console.log(result.html)
            $('.category-child').html(result.html);
        }, 'json');
        return false;
    });
}

function init_js() {
       
    $("table .delete-row").click(function(){

        var ele = $(this);
        bootbox.confirm("Bạn có muốn xóa thông tin này?", function(result) {
            if (result) {
            
                $.get(ele.attr('href'),"",function(){
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

        bootbox.confirm("Bạn có muốn xóa Thể loại này?", function(result) {
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

function bind_user() {
    $("#users .ban").on('click', function() {
        var ele = $(this);
        var parent = ele.parents('tr');
        var disabled = 0;
        if(ele.prop('checked') == false){
            disabled = 1
        }
        var data = {
            disabled:disabled
        }
      

        $.get(ele.attr('data-url'), data, function(data) {
           
            }, 'json');
        return true;
    });

}

//function bind_category() {
//    $(".category-type").change(function() {
//        var ele = $(this);
//        window.location = baseUrl + "category/index/type/" + ele.val();
//    });
//}

function display_error(msg) {
    $(".alert-success").hide();
    $(".alert-error .msg").html(msg);
    $(".alert-error").fadeIn('slow');
}

function display_success(msg) {
    $(".alert-error").hide();
    $(".alert-success .msg").html(msg);
    $(".alert-success").fadeIn('slow');
}

function display_form_success(ele){
    console.log('aaaa');
    var form =  ele.closest('form');
    $('.alert-success',form).removeClass('hide');
}

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example 1: number_format(1234.56);
    // *     returns 1: '1,235'
    // *     example 2: number_format(1234.56, 2, ',', ' ');
    // *     returns 2: '1 234,56'
    // *     example 3: number_format(1234.5678, 2, '.', '');
    // *     returns 3: '1234.57'
    // *     example 4: number_format(67, 2, ',', '.');
    // *     returns 4: '67,00'
    // *     example 5: number_format(1000);
    // *     returns 5: '1,000'
    // *     example 6: number_format(67.311, 2);
    // *     returns 6: '67.31'
    // *     example 7: number_format(1000.55, 1);
    // *     returns 7: '1,000.6'
    // *     example 8: number_format(67000, 5, ',', '.');
    // *     returns 8: '67.000,00000'
    // *     example 9: number_format(0.9, 0);
    // *     returns 9: '1'
    // *    example 10: number_format('1.20', 2);
    // *    returns 10: '1.20'
    // *    example 11: number_format('1.20', 4);
    // *    returns 11: '1.2000'
    // *    example 12: number_format('1.2000', 3);
    // *    returns 12: '1.200'
    // *    example 13: number_format('1 000,50', 2, '.', ' ');
    // *    returns 13: '100 050.00'
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
    };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

