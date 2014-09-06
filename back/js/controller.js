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
        $('#order').bootstrapValidator(order_validate_options);
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
    $scope.currentPage = 0;
    $scope.pageSize = 10;    
    $scope.numOfPage = 0;
	$scope.orders;
    $scope.pages = [];
	$scope.init = function(){
        var data_promise = order.get_orders();
        console.log(data_promise);
	    data_promise.then(function(result) {  
	    	// this is only run after $http request completed
	       $scope.orders = eval(result);	     
	       $scope.numOfPage = Math.ceil($scope.orders.length/$scope.pageSize); 
           for(var i = 1; i <= $scope.numOfPage; i++){
            $scope.pages.push(i);
           }
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
            console.log(result);  
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
       $scope.tos = temp;
    }
    $scope.downloadReport = function(e){
        e.preventDefault();
        if(($scope.to - $scope.from) < 0 || $scope.to <= 0 || $scope.from <= 0){
            //set confirm dialog options
            var modalOptions = {
                alert: true,
                closeButtonText: 'Okay',
                actionButtonText: '',
                headerText: 'Invalid range',
                bodyText: "Please choose a valid range of ids to export!"
            };
            modalService.showModal({}, modalOptions).then(function (result) {
                $("#download_report_form").submit();
            });
            return;
        }
        var data_promise = order.check_reported($scope.from, $scope.to);
        data_promise.then(function(result) {
            if(result.length <= 0) $("#download_report_form").submit();
            else{
               //set confirm dialog options
                var modalOptions = {
                    alert: false,
                    closeButtonText: 'Cancel',
                    actionButtonText: 'Export Anyway',
                    headerText: 'Export Duplication?',
                    bodyText: result
                };
                modalService.showModal({}, modalOptions).then(function (result) {
                    $("#download_report_form").submit();
                });
            }
        });
    }
});

/********END CONTROLLERS********/