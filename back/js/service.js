//bootstrap validator options - validate order form (for create and edit shipping order)
var order_validate_options = {
    message: 'This value is not valid',   
    fields: {
    number:{ //tracker-number
        message: 'Tracker number is invalid',
        validators: {
            notEmpty: {
                message: 'Tracker number is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z0-9]+$/,
                message: 'Tracker number can only contain digits & alphabets'
            }
        }
    },
    firstname: { //sender first name
        message: 'The firstname is not valid',
        validators: {
            notEmpty: {
                message: 'First name is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'First name can only consist of alphabetical'
            }
        }
    },
    middlename: { //sender middle name
        message: 'The middlename is not valid',
        validators: {                                     
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'Middle name can only consist of alphabetical'
            }
        }
    },
    lastname: { //sender last name
        message: 'The lastname is not valid',
        validators: {
            notEmpty: {
                message: 'Last name is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'Last name can only consist of alphabetical'
            }
        }
    },
    address: { //sender address
        message: 'The address is not valid',
        validators: {
            notEmpty: {
                message: 'The address is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z0-9 ,]+$/,
                message: 'The address can only consist of alphabetical and digits'
            }
        }
    },
    city: { //sender city
        message: 'The city is not valid',
        validators: {
            notEmpty: {
                message: 'The city is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'The city can only consist of alphabetical'
            }
        }
    },
    state: { //sender state
        message: 'The state is not valid',
        validators: {
            notEmpty: {
                message: 'The state is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'The state can only consist of alphabetical'
            }
        }
    },
    code: { //sender zipcode
        message: 'The zip code is not valid',
        validators: {
            notEmpty: {
                message: 'The zip code is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[0-9]+$/,
                message: 'The zip code can only consist of digits'
            }
        }
    },
    country: { //sender country
        message: 'The country is not valid',
        validators: {
            notEmpty: {
                message: 'The country is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'The country can only consist of alphabetical'
            }
        }
    },
    email: { //sender email
        validators: {
            notEmpty: {
                message: 'The email is required and cannot be empty'
            },
            emailAddress: {
                message: 'The input is not a valid email address'
            }
        }
    },
    tel: { //sender mobile phone number
        validators: {
            notEmpty: {
                message: 'The telephone number is required and cannot be empty'
            },
            regexp: {
                regexp: /^[0-9]{8,}$/,
                message: 'Telephone number must have at least 8 digits'
            }
        }
    },
    firstname2: { //receiver firstname
        message: 'The firstname is not valid',
        validators: {
            notEmpty: {
                message: 'First Name is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'First Name can only consist of alphabetical'
            }
        }
    },
    middlename2: { //receiver middle name
        message: 'The middlename is not valid',
        validators: {                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'Middle Name can only consist of alphabetical'
            }
        }
    },
    lastname2: { //receiver last name
        message: 'The lastname is not valid',
        validators: {
            notEmpty: {
                message: 'Last Name is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'Last Name can only consist of alphabetical'
            }
        }
    },
    address2: { //receiver address
        message: 'The address is not valid',
        validators: {
            notEmpty: {
                message: 'The address is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z0-9 ,]+$/,
                message: 'The address can only consist of alphabetical and digits'
            }
        }
    },
    city2: { //receiver city
        message: 'The city is not valid',
        validators: {
            notEmpty: {
                message: 'The city is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'The city can only consist of alphabetical'
            }
        }
    },
    state2: { //receiver state
        message: 'The state is not valid',
        validators: {
            notEmpty: {
                message: 'The state is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'The state can only consist of alphabetical'
            }
        }
    },
    code2: { //receiver zipcode
        message: 'The zip code is not valid',
        validators: {
            notEmpty: {
                message: 'The zip code is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[0-9]+$/,
                message: 'The zip code can only consist of digits'
            }
        }
    },
    country2: { //receiver country
        message: 'The country is not valid',
        validators: {
            notEmpty: {
                message: 'The country is required and cannot be empty'
            },                    
            regexp: {
                regexp: /^[a-zA-Z ]+$/,
                message: 'The country can only consist of alphabetical'
            }
        }
    },
    tel2: { //receiver mobile phone number
        validators: {
            notEmpty: {
                message: 'The telephone number is required and cannot be empty'
            },
            regexp: {
                regexp: /^[0-9]{8,}$/,
                message: 'Telephone number must have at least 8 digits'
            }
        }
    },
    email2: { //receiver email
        validators: {
            notEmpty: {
                message: 'The email is required and cannot be empty'
            },
            emailAddress: {
                message: 'The input is not a valid email address'
            }
        }
    },
    height: { //package height
        validators: {
            notEmpty: {
                message: 'The height is required and cannot be empty'
            },
            numeric: {
                message: 'The height entered is not valid'
            }
        }
    },
    length: { //package length
        validators: {
            notEmpty: {
                message: 'The length is required and cannot be empty'
            },
            numeric: {
                message: 'The length entered is not valid'
            }
        }
    },
    depth: { //package depth
        validators: {
            notEmpty: {
                message: 'The depth is required and cannot be empty'
            },
            numeric: {
                message: 'The depth entered is not valid'
            }
        }
    },                                                                     
    weight: { //package weight
        validators: {
            notEmpty: {
                message: 'The weight is required and cannot be empty'
            },
            numeric: {
                message: 'The weight entered is not valid'
            }
        }
    },
    box_qty: { //package quantity
        validators: {
            notEmpty: {
                message: 'Must not be empty'
            },        
        }
    },    
}
};

function getFormValue(id){
var arrayData = $('form#' + id).serializeArray();
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
return objectData;
}

/********MODEL********/
var app = angular.module("calicargo",['ngRoute', 'ngResource', 'ngSanitize', 'ui.bootstrap']);
/**
    Order Model - You can find order-related services here
*/
app.provider("order", function () {    
    this.view_orders_title = '';
    this.editUrl = '';
    this.$get = function($http, $rootScope, $q) {        
        var view_orders_title = this.view_orders_title;
        var editUrl = this.editUrl;
        return {            
            //get all orders
            get_orders: function() {
                //async helper - return the value AFTER $http request is DONE
                var deferred = $q.defer();
                //call ShipOrderController::actionGet_orders
                $http({method:"GET", url:$rootScope.baseUrl + "shipOrder/get_orders"}).success(function(result){
                    deferred.resolve(result);
                });                
                return deferred.promise;                
            },
            //get order by id
            get_order: function(id) {
                //async helper - return the value AFTER $http request is DONE
                var deferred = $q.defer();
                //call ShipOrderController::actionGet_order_by_id
                $http({method:"GET", url:$rootScope.baseUrl + "shipOrder/get_order_by_id/" + id}).success(function(result){
                    console.log(result);
                    deferred.resolve(result);
                });                
                return deferred.promise;                
            },
            //get list item by order id
            get_items: function(id) {
                //async helper - return the value AFTER $http request is DONE
                var deferred = $q.defer();
                //call ShipOrderController::actionGet_order_by_id
                $http({method:"GET", url:$rootScope.baseUrl + "shipOrder/get_items_by_order/" + id}).success(function(result){
                    console.log("DEBUG");
                    console.log(result);
                    console.log("DEBUG");
                    deferred.resolve(result);
                });                
                return deferred.promise;                
            },
            //get all orders
            delete_order: function(id) {
                //async helper - return the value AFTER $http request is DONE
                var deferred = $q.defer();
                //call ShipOrderController::actionDelete
                $http({
                    url: $rootScope.baseUrl + "shipOrder/delete",
                    method: "POST",
                    data: {id : id},
                }).success(function(result){
                    deferred.resolve(result);
                });                
                return deferred.promise;                
            },
            //check reported ids
            check_reported: function(from, to) {
                //async helper - return the value AFTER $http request is DONE
                var deferred = $q.defer();
                //call ShipOrderController::actionCheck_reported
                $http({
                    url: $rootScope.baseUrl + "shipOrder/check_reported",
                    method: "POST",
                    data: {from : from, to : to},
                }).success(function(result){
                    deferred.resolve(result);
                });                
                return deferred.promise;                
            },
            //get view order title - can be set in app.config (placed in footer.php)
            view_orders_title: this.view_orders_title,
            //get columns for shipping order table (just for displaying the columns in view)
            //TODO: should be changed so that it could be config in app.config also
            get_columns_for_view: function(){
                return ['ID', 'Order Type', 'D2D/A2A', 'Sender Name', 'Sender Contact', 'Added On', 'Action'];
            },
            //getEditUrl
            edit_url: this.editUrl,
        }
    };    
    //setters
    this.setViewOrderTitle = function(title) {
        this.view_orders_title = title;
    };
    this.setEditUrl = function(url){
        this.editUrl = url;
    }
});
/**
    Utility - angular app helper
*/
app.provider("utility", function () {
    this.default_error_msg = '';
    this.default_success_msg = '';
    this.baseUrl = '';
    this.$get = function() {
        var default_error_msg = this.default_error_msg;
        var default_success_msg = this.default_success_msg;
        var baseUrl = baseUrl;
        return {
            //general err msg
            default_error_msg: this.default_error_msg,
            default_success_msg: this.default_success_msg,
            //base Url
            baseUrl: this.baseUrl
        }
    };
    //setters
    this.setDefaultErrorMsg = function(default_error_msg) {
        this.default_error_msg = default_error_msg;
    };
    this.setDefaultSuccessMsg = function(default_success_msg) {
        this.default_success_msg = default_success_msg;
    };
    this.setBaseUrl = function(url) {
        this.baseUrl = url;
    };    
});

app.service('modalService', ['$modal', '$rootScope', function ($modal, $rootScope) {

        var modalDefaults = {
            backdrop: true,
            keyboard: true,
            modalFade: true,
            templateUrl: $rootScope.baseUrl + '/template/modal/confirm.html'
        };

        var modalOptions = {
            alert : false,
            closeButtonText: 'Close',
            actionButtonText: 'OK',
            headerText: 'Proceed?',
            bodyText: 'Perform this action?'
        };

        this.showModal = function (customModalDefaults, customModalOptions) {
            if (!customModalDefaults) customModalDefaults = {};
            customModalDefaults.backdrop = 'static';
            return this.show(customModalDefaults, customModalOptions);
        };

        this.show = function (customModalDefaults, customModalOptions) {
        //Create temp objects to work with since we're in a singleton service
        var tempModalDefaults = {};
        var tempModalOptions = {};

        //Map angular-ui modal custom defaults to modal defaults defined in service
        angular.extend(tempModalDefaults, modalDefaults, customModalDefaults);

        //Map modal.html $scope custom properties to defaults defined in service
        angular.extend(tempModalOptions, modalOptions, customModalOptions);

        if (!tempModalDefaults.controller) {
            tempModalDefaults.controller = function ($scope, $modalInstance) {
                $scope.modalOptions = tempModalOptions;
                $scope.modalOptions.ok = function (result) {
                    $modalInstance.close(result);
                };
                $scope.modalOptions.close = function (result) {
                    $modalInstance.dismiss('cancel');
                };
            }
        }

        return $modal.open(tempModalDefaults).result;
    };

}]);

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
app.filter('startFrom', function() {
    return function(input, start) {
        if (!angular.isArray(input)) {
            return [];
        }
        start = +start; //parse to int
        return input.slice(start);
    }
});