
(function($){


    "use strict";

    $(document).ready(function() {

        /*******Form Validator***********/
$('#order').bootstrapValidator(order_validate_options);
//front-end: 3 shipping forms && back-end: create shipping order
$("#success-notification").hide();
$("#failure-notification").hide();

$('#export-order').click(function(){
    var url = window.location.href;
    var url = url.replace('ship-order-update', 'ship-order-export');
    window.location.href = url;	
});

$('.ship-cal').change(function(){
    var ship_discount = $('#ship_discount').val();
    var ship_fee = $('#ship_fee_lbs').val();
    var ship_weight = $('#total_wt_lbs').val();
    if(ship_discount > 0)
        var total = ship_fee * ship_weight - (ship_fee * ship_weight * (ship_discount / 100));
    else
        var total = ship_fee * ship_weight;
    $('#total_ship_fee').html('$' + total);
});

$('.item_val').change(function(){
    var size = $('#item-count').val();
    if(size > 0){
        var total_value = 0;
        var total_airport_fee = 0;
        for(var i=0; i<size;i++){
            var value = parseInt($("#item_value" + i).val());
            var air_fee = parseInt($("#item_airport_fee" + i).val());
            var qty = parseInt($("#qty" + i).val());
            total_value += value * qty;
            total_airport_fee += air_fee * qty;
        }
    }
    else{
        var total_value = $("#total_value").val();
        var total_airport_fee = $("#total_airport_fee").val();
    }
    var discount = parseInt($("#total_discount").val());
    if(discount > 0) total_value -= total_value * (discount/100);
    $("#total_value").val(total_value);
    $("#total_airport_fee").val(total_airport_fee);
});

$(".delete-row").click(function(){
var id = $(this).attr("id");
$('#tobe-deleted').val(id);
$('#myModal').modal();
});

$("#export-btn").click(function(){		
    $('#export-modal').modal();
});

$("#download_report").click(function(){
    if( parseInt($("#from_ship_id")) >= parseInt($("#to_ship_id")) )
    {
        alert("Order range invalid, please choose again"); 
        return;
    }
// Format form data
var arrayData = $('form#' + 'download_report_form').serializeArray();
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
var url = window.location.href;
var url = url.replace('ship-order-management', '');
url = url + 'shipOrder/check_reported';
$.ajax({
    url: url,
    type: "POST",
    data: {info : objectData},
    context: document.body
}).done(function(data) {
    if(data == 'false') 
    {
        $("#download_report_form").submit();
        $('#export-modal').modal('hide');
    }
    else 
    {
        $("#record-dup-msg").html(data);
        $("#record-dup-modal").modal();
        $('#export-modal').modal('hide');
    }
})
.error(function(){			
});	
});

$("#report_record").click(function(){
    $("#download_report_form").submit();
    $("#record-dup-modal").modal('hide');
});

$("#delete_record").click(function(){
    var id = $("#tobe-deleted").val();
    var url = window.location.href;
    var url = url.replace('ship-order-management', 'ship-order-delete' + '/' + id);
    $.ajax({
        url: url,
        type: "POST",
        data: {},
        context: document.body
    }).done(function(data) {
        $("#row" + id).hide();
        $("#success-notification").show();			
        $('html,body').animate({
            scrollTop: $("#success-notification").offset().top
        });
        $('#myModal').modal('hide');
    })
    .error(function(){

    });
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

$("#download_outcome_report").click(function(){
    $("#download_report_form").submit();
});

/*******End of Form Validator****/
});
})(jQuery);

/********CONTROLLERS********/
app.controller("AddShipOrderCtrl", function ($rootScope, $scope, $http, utility, order, $location, $anchorScroll) {
    $scope.counter = 1;
    $scope.items = [];
    $scope.canDelete = false;    
    $scope.action_success = false;
    $scope.action_failure = false;
    $scope.isSubmitted = false;
    $scope.thisItem = null;
    $scope.order_types;
    $scope.edit_init = function(id){
        //Todo: need to get this array from backend
        $scope.order_types = ['ship_amazon', 'ship_ups', 'order_amazon'];
    	var data_promise = order.get_order(id);
	    data_promise.then(function(result) {  
	    // this is only run after $http request completed
	       $scope.thisItem = result;
	    });
        var data_promise = order.get_items(id);
        data_promise.then(function(result) {  
        // this is only run after $http request completed
           $scope.items = result;
        });
    }

    $scope.init = function(){
        newItem();           
        $scope.thisItem = {
	        total : 0,
		    total_value : 0,
		    total_airport_fee : 0,
		    order_discount : 0,
		    order_fee : 0,
		    ship_discount : 0,
		    total_wt_lbs : 0,
		    ship_fee_per_lbs : 0,
		    total_ship_fee : 0,
		    box_qty : 1,     
	    }
    }
    function newItem(){        
        var new_item = {};
        new_item['id'] = $scope.counter; 
        new_item['name'] = '';           
        new_item['description'] = '';           
        new_item['qty'] = 1;
        new_item['wt_lbs'] = 0;
        new_item['value'] = 0;
        new_item['airport_fee'] = 0;
        $scope.items.push(new_item);  
        console.log($scope.items);
        if($scope.items.length > 1) $scope.canDelete = true;
        else $scope.canDelete = false;
        $scope.counter ++;
    }       
    function deleteItem(id){
        console.log($scope.items);
        items = [];
        for(var i = 0; i < $scope.items.length; i++){
            if($scope.items[i]['id'] != id){
                items.push($scope.items[i]);
            }
        }
        $scope.items = items;
        if($scope.items.length > 1) $scope.canDelete = true;
        else $scope.canDelete = false;
        $scope.updateOrder();
    } 
    $scope.addItem = function(e){        
        e.preventDefault();        
        newItem();
    }    
    $scope.removeItem = function(e, id){        
        e.preventDefault();
        deleteItem(id);
    } 
    $scope.updateOrder = function(){
        //set variables to 0
        $scope.thisItem.total_value = $scope.thisItem.total_airport_fee = $scope.thisItem.total_ship_fee = 0;
        //order fee
        for(var i = 0; i < $scope.items.length; i++){
            $scope.thisItem.total_value += ( parseFloat($scope.items[i].value) * parseInt($scope.items[i].qty) );         
            $scope.thisItem.total_airport_fee += ( parseFloat($scope.items[i]['airport_fee']) * parseInt($scope.items[i]['qty']) );                     
        }                
        //shipping fee   
        $scope.thisItem.total_ship_fee = $scope.thisItem.ship_fee_per_lbs * $scope.thisItem.total_wt_lbs;
        //if airport fee discount ithisItem.s available       
        if(parseInt($scope.thisItem.order_discount) > 0) {
            $scope.thisItem.total_airport_fee = $scope.thisItem.total_airport_fee - $scope.thisItem.total_airport_fee * ($scope.thisItem.order_discount/100);
        }          
        //if shipping discount is available
        if($scope.thisItem.ship_discount > 0){
            $scope.thisItem.total_ship_fee = $scope.thisItem.total_ship_fee - $scope.thisItem.total_ship_fee * ($scope.thisItem.ship_discount/100);
        }
        //total order value
        $scope.thisItem.total = $scope.thisItem.total_airport_fee + $scope.thisItem.total_ship_fee + $scope.thisItem.order_fee;
    }       
    
    $scope.sendOrder = function(){        
        $scope.isSubmitted = true;
        var is_valid = $('#order').data('bootstrapValidator').isValid();
        if(!is_valid){
            var first_error_elem = $('#order').data('bootstrapValidator').validate()['$invalidFields'][0];
            $(first_error_elem).focus();
            return;
        }
        for(var i = 0; i < $scope.items.length; i++){
        	item = $scope.items[i];
        	console.log($('#name_' + item['id']));
            if(item['name'] == '' || item['name'] == null) {
                $('#name_' + item['id']).focus();
                return;
            }
            if(item['qty'] == '' || item['qty'] <= 0) {
                $('#qty_' + item['id']).focus();
                return;
            }                                    
        }
        var info = getFormValue("order");
        $http({
	        url: '',
	        method: "POST",
	        data: {items : $scope.items, info : info},
	        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data, status, headers, config) {
            $('#row').hide();
            $scope.action_success = true;
        }).error(function (data, status, headers, config) {
            $scope.action_failure = true;        
        });

        
        //$scope.action_failure = true;        
    }
    $scope.newOrder = function(){
    	$scope.action_success = false;
        $scope.action_failure = false;        	
        $('#row').show();
        $('form#order')[0].reset();
    }
    $scope.backToList = function(){
        window.location.href = $rootScope.baseUrl + "ship-order-management";
    }
    $scope.openEdit = function(){
        $('#row').show();
        $scope.action_success = false;
        $scope.action_failure = false;          
    }
    $scope.exportOrder = function(id){
        window.location.href=$rootScope.baseUrl + "shipOrder/export/" + id;
    }
});

app.controller("ViewShipOrderCtrl", function ($rootScope, $scope, $http, utility, order, modalService) {
	$scope.module_title = order.view_orders_title;
	$scope.columns = order.get_columns_for_view();
	console.log($scope.module_title);
	$scope.orders;
	$scope.init = function(){
        var data_promise = order.get_orders();
        console.log(data_promise);
	    data_promise.then(function(result) {  
	    	// this is only run after $http request completed
	       $scope.orders = eval(result);	     
	       console.log($scope.orders);
	    });
    }
    $scope.fullname = function(f, m, l){
    	if(m!= null && m!= '') return f + " " + m + " " + l;
    	return f + " " + l;
    }
    $scope.address = function(ad, ci, st, zi, co){
    	var address = "";
    	var arr = [ad, ci, st, zi, co];
    	for(var i = 0 ; i < arr.length; i++){
    		if(arr[i] != null && arr[i] != ''){
    			if(address.length <= 0) address += arr[i];
    			else address += " , " + arr[i];
    		}
    	}
    	return address;
    }
    $scope.editUrl = function(id){
    	return order.edit_url + id;
    }
    $scope.dateConverter = function(d){
    	var newDate = new Date();
		newDate.setTime( d*1000 );
		return newDate;
    }
    function findOrderById(id){
    	var order;
    	for(var i = 0; i < $scope.orders.length; i++){
    		if($scope.orders[i]['ship_order_id'] == id){
    			order = $scope.orders[i];
    			break;
    		}
    	}
    	return order;
    }
    $scope.delete_order = function(id){
    	//get the tobe deleted order
    	if(findOrderById(id) == null) return;
    	var o = findOrderById(id);
    	//set confirm dialog options
        var modalOptions = {
            closeButtonText: 'Cancel',
            actionButtonText: 'Delete Order',
            headerText: 'Delete Order #' + o['ship_order_id'] + '?',
            bodyText: 'This order and very items associated with it will be gone and cannot be reversed. Are you sure to perform this action?'
        };

        modalService.showModal({}, modalOptions).then(function (result) {
            var data_promise = order.delete_order(id);
		    data_promise.then(function(result) {  
		    	// this is only run after $http request completed
		    	orders = [];
		        for(var i = 0; i < $scope.orders.length; i++){
		            if($scope.orders[i]['ship_order_id'] != id){
		                orders.push($scope.orders[i]);
		            }
		        }
		        $scope.orders = orders;
		       console.log(result);
		    });
        });
    	
    }

});

//controller for shipping order report page
app.controller("ShipReportCtrl", function ($rootScope, $scope, $http, utility, order, modalService) {
    $scope.froms = [];
    $scope.tos = [];
    $scope.from = 0;
    $scope.to = 0;
    $scope.items;
    $scope.init = function(){
        var data_promise = order.get_orders();
        data_promise.then(function(result) {  
        // this is only run after $http request completed
           $scope.items = result;
           for(var i = 0; i < $scope.items.length; i++){
                $scope.froms.push($scope.items[i]['ship_order_id']);
                $scope.tos.push($scope.items[i]['ship_order_id']);
           }           
        });
    }  
    $scope.changeToId = function(){
        temp = [];
        for(var i = 0; i < $scope.items.length; i++){
            if($scope.items[i]['ship_order_id'] >= $scope.from){
                temp.push($scope.items[i]['ship_order_id']);
            }
       }           
       $scope.froms = temp;
    }
    $scope.downloadReport = function(e){
        e.preventDefault();
        if(($scope.to - $scope.from) < 0 || $scope.to <= 0 || $scope.from <= 0){
            alert("invalid ids");
            return;
        }
        $("#download_report_form").submit();
    }
});

/****** number filter ******
/*
Usage: <input type='text' only-digits min-num="0" max-num="10" /> (only integer from 0-10 allowed)
Or:    <input type='text' only-digits allow-decimal='true' /> (to enable float number inputs)
Or:    <input type='text' only-digits allow-negative='true' /> (to enable negative number inputs)
*/
app.directive("onlyDigits", function ()
{
    return {
        restrict: 'EA',
        require: '?ngModel',
        scope:{
            allowDecimal: '@',
            allowNegative: '@',
            minNum: '@',
            maxNum: '@'
        },
        link: function (scope, element, attrs, ngModel)
        {
            if (!ngModel) return;
            ngModel.$parsers.unshift(function (inputValue)
            {
                var isDecimal = false;
                var digits = inputValue.split('').filter(function (s,i)
                {
                    var b = (!isNaN(s) && s != ' ');
                    if (!b && attrs.allowDecimal && attrs.allowDecimal == "true")
                    {
                        if (s == "." && isDecimal == false)
                        {
                            isDecimal = true;
                            b = true;
                        }
                    }
                    if (!b && attrs.allowNegative && attrs.allowNegative == "true")
                    {
                        b = (s == '-' && i == 0);
                    }
                    return b;
                }).join('');
                if (attrs.maxNum && !isNaN(attrs.maxNum) && parseFloat(digits) > parseFloat(attrs.maxNum))
                {
                    digits = attrs.maxNum;
                }
                if (attrs.minNum && !isNaN(attrs.minNum) && parseFloat(digits) < parseFloat(attrs.minNum))
                {
                    digits = attrs.minNum;
                }
                ngModel.$viewValue = digits;
                ngModel.$render();
                return digits;
            });
        }
    };
});

/********END CONTROLLERS********/