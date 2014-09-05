<section id="content" ng-controller="AddShipOrderCtrl" ng-init="edit_init(<?php echo $id ?>)">
  <section class="vbox">
    <section class="scrollable padder">             
      <div class="m-b-md">        
        <div id="msg_box"></div>
        <h3 class="m-b-none">Edit Shipping Order</h3>
        <!--Action completed successfully msg alert-->
        <div ng-if="action_success" class="m-t alert alert-success alert-dismissible" role="alert">           
          <span class="col-xs-3">{{default_success_msg}}</span> 
          <button class="btn btn-success" ng-click="backToList()">Back to List Orders</button>
          <button class="btn btn-success" ng-click="openEdit()">Re-edit Order</button>
        </div>      
        <!--Action failure msg alert-->
        <div ng-if="action-failure" class="m-t alert alert-danger alert-dismissible" role="alert"> 
          <span class="col-xs-3">{{default_error_msg}}</span> <button class="btn btn-danger" ng-click="newOrder()">Try again</button>
        </div>      
      </div>
      <div class="row" id="row">        
          <form id="order" class="form-horizontal"  role="form">
            <section class="panel panel-default">          
              <header class="panel-heading font-bold">Shipper Information</header>
              <div class="panel-body">
                <!--Name-->
                <div class="form-group">
                  <label class='col-xs-1'>Full Name</label>
                  <div class="col-xs-4">
                    <input type="text" class="form-control" ng-model="thisItem.sender_first_name" name="firstname" id="firstname" 
                    placeholder="First Name">
                  </div> 
                  <div class="col-xs-4">
                    <input type="text" class="form-control" ng-model="thisItem.sender_middle_name" name="middlename" id="middlename" 
                    placeholder="Middle Name (optional)">
                  </div>                                                             
                  <div class="col-xs-3">
                    <input type="text" class="form-control" ng-model="thisItem.sender_last_name" name="lastname" id="lastname" 
                    placeholder="Last Name">
                  </div>                                
                </div>  
                <!--Adress-->            
                <div class="form-group">
                  <label class='col-xs-1'>Address</label>
                  <div class="col-xs-6">
                    <input type="text" class="form-control"  ng-model="thisItem.sender_address" name="address" id="address" placeholder="Address">
                  </div>                                
                  <div class="col-xs-5">
                    <input type="text" class="form-control" ng-model="thisItem.sender_city" name="city" id="city" placeholder="City">
                  </div>                
                </div>  
                <div class="form-group">
                    <div class=" col-xs-offset-1 col-xs-4">
                      <input type="text" class="form-control" ng-model="thisItem.sender_state" name="state" id="state" placeholder="State">
                    </div>                                
                    <div class="col-xs-3">
                      <input type="text" class="form-control" ng-model="thisItem.sender_zipcode" name="code" id="code" placeholder="Zip Code">
                    </div>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" ng-model="thisItem.sender_country" name="country" id="country" placeholder="Country">
                    </div>
                </div>  
                <!--Contact Information-->          
                <div class="form-group">
                  <label class="col-xs-1">Contact</label>
                  <div class="col-xs-5">
                    <input type="tel" class="form-control" ng-model="thisItem.sender_tel" name="tel" id="tel" placeholder="Telephone">
                  </div>                                                              
                  <div class="col-xs-6">
                    <input type="email" class="form-control" ng-model="thisItem.sender_email" name="email" id="email" placeholder="Email">
                  </div>                                
                </div>                                                    
              </div>
            </section>
            <!--Receiver Information-->
            <section class="panel panel-default">          
              <header class="panel-heading font-bold">Receiver Information</header>
              <div class="panel-body">  
                <!--Full Name-->              
                <div class="form-group">                
                  <label class="col-xs-1">Full Name</label>
                  <div class="col-xs-4">
                    <input type="text" class="form-control" ng-model="thisItem.receiver_first_name" name="firstname2" id="firstname2" 
                    placeholder="First Name">
                  </div>      
                  <div class="col-xs-4">
                    <input type="text" class="form-control" ng-model="thisItem.receiver_middle_name" name="middlename2" id="middlename2" 
                    placeholder="Middle Name (optional)">
                  </div>                                                                                                      
                  <div class="col-xs-3">
                    <input type="text" class="form-control" ng-model="thisItem.receiver_last_name" name="lastname2" id="lastname2" 
                    placeholder="Last Name">
                  </div>                                
                </div>
                <!--Address-->
                <div class="form-group">
                    <label class="col-xs-1">Address</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" ng-model="thisItem.receiver_address" name="address2" id="address2" placeholder="Address">
                    </div>                                
                    <div class="col-xs-5">
                        <input type="text" class="form-control" ng-model="thisItem.receiver_city" name="city2" id="city2" placeholder="City">
                    </div>
                </div>                            
                <div class="form-group">
                    <div class=" col-xs-offset-1 col-xs-4">
                        <input type="text" class="form-control" ng-model="thisItem.receiver_state" name="state2" id="state2" placeholder="State">
                    </div>                                
                    <div class="col-xs-3">
                        <input type="text" class="form-control" ng-model="thisItem.receiver_zipcode" name="code2" id="code2" placeholder="Zip Code">
                    </div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" ng-model="thisItem.receiver_country" name="country2" id="country2" placeholder="Country">
                    </div>
                </div>
                <!--Contact-->
                <div class="form-group">
                    <label class="col-xs-1">Contact</label>
                    <div class="col-xs-5">
                        <input type="tel" class="form-control" ng-model="thisItem.receiver_tel" name="tel2" id="tel2" placeholder="Telephone">
                    </div>                                                              
                    <div class="col-xs-6">
                        <input type="email" class="form-control" ng-model="thisItem.receiver_email" name="email2" id="email2" placeholder="Email">
                    </div>                                
                </div>
              </section>
              <!--Item Information-->
              <section class="panel panel-default">          
                <header class="panel-heading font-bold">
                  Item Information
                </header>
                <div class="panel-body">                
                  <!--Item list-->
                  <div class="form-group">                         
                    <label class="col-xs-2">Name</label>                                                             
                    <label class="col-xs-1">Qty</label>       
                    <label class="col-xs-6">Description</label>       
                    <label class="col-xs-1"> Weight</label>       
                    <label class="col-xs-1">Airport Fee</label>       
                    <label class="col-xs-1">Item Value</label>       
                    <label class="col-xs-1"></label>                                                             
                  </div>                                                                                                            
                  <input type="hidden" value="1" id="item-count" ng-model="counter" />               
                  <div class="form-group" ng-repeat="i in items" id='item_group_{{i.id}}'>                       
                    <div class="col-xs-2">
                      <input type="text" class="form-control" name="name[]" ng-model="i.name" id="name_{{i.id}}" >
                      <small class="help-block" style="color:#a94442;" data-bv-validator="notEmpty" ng-show="i.name == ''"
                      data-bv-for="name[]" data-bv-result="INVALID">Must not be empty</small>
                    </div>
                    <div class="col-xs-1">
                      <input type="text" only-digits min="1" ng-change="updateOrder()" ng-model="i.qty" class="form-control" 
                      name="qty[]" id="qty_{{i.id}}" >
                      <small class="help-block" style="color:#a94442;" data-bv-validator="notEmpty" ng-show="i.qty == ''"
                      data-bv-for="qty[]" data-bv-result="INVALID">Must not be empty</small>
                    </div>
                    <div class="col-xs-6">
                      <input type="text" class="form-control" name="desc[]" ng-model="i.description" id="desc_{{i.id}}">                      
                    </div>                      
                    <div class="col-xs-1">
                      <input type="text" only-digits allow-decimal="true" ng-change="updateOrder()" 
                      ng-model="i.wt_lbs" class="item_val form-control" name="wt[]" 
                      id="wt_{{i.id}}" >                      
                    </div>
                    <div class="col-xs-1">
                      <input type="text" only-digits allow-decimal="true" ng-change="updateOrder()" 
                      ng-model="i.airport_fee" class="item_val form-control" name="airport_fee[]" 
                      id="airport_fee_{{i.id}}" >                      
                    </div>

                    <div class="col-xs-1">
                      <input type="text" only-digits allow-decimal="true" ng-change="updateOrder()" 
                      ng-model="i.value" class="item_val form-control" name="item_value_{{i.id}}" 
                      id="value_{{i.id}}" >                         
                    </div>
                    <!-- <div class="col-xs-1" style="padding-left:0;padding-bottom:0;padding-top:0;">                                 
                      <button class="col-xs-12 btn btn-sm btn-danger {{!canDelete ? 'disabled' : ''}}" 
                      ng-click='removeItem($event, i.id)'>
                        Delete
                      </button>                      
                    </div>                                                             -->
                    <div class="col-xs-12"><div class="line line-dashed line-lg pull-in"></div></div>
                    <input type="hidden" value="1" name="total_item" id="total_item" />
                </div>
                <!--Order information-->                  
                <div class="form-group">
                  <label class="col-xs-8"></label>
                  <label class="col-xs-1 k-no-pad-left text-left">Airport Fee Discount (%)</label>                                        
                  <label class="col-xs-1 k-no-pad-left text-left">Total Airport Fee</label>
                  <label class="col-xs-1 k-no-pad-left text-left">Total Item Value</label>
                  <label class="col-xs-1 k-no-pad-left text-left">Order Fee</label>
                </div>
                <div class="form-group">            
                  <label class="col-xs-8"></label>                    
                  <div class="col-xs-1">
                    <input type="text" only-digits ng-change="updateOrder()" ng-model="thisItem.order_discount" 
                    min="0" max="99" data-bv-integer-message="Required" class="item_val form-control" 
                    id="total_discount"  name="total_discount" placeholder="Total Discount">
                  </div>                                        
                  <div class="col-xs-1">
                    <input type="text" ng-model="thisItem.total_airport_fee" readonly class="form-control">
                  </div>
                  <div class="col-xs-1">
                    <input type="text" ng-model="thisItem.total_value" readonly class="form-control">
                  </div>
                  <div class="col-xs-1">
                    <input type="text" only-digits allow-decimal="true" ng-change="updateOrder()" 
                    ng-model="thisItem.order_fee" data-bv-integer-message="Required" class="form-control" 
                    id="order_fee" name="order_fee" placeholder="Order Fee">
                  </div>
                </div>                  
              </section>
              <!--Shippong Infomation-->
              <!--Item Information-->
              <section class="panel panel-default">          
                <header class="panel-heading font-bold">
                  Shipping Information
                </header>
                <div class="panel-body">                
                  <!--Shipping + Order Type-->
                  <div class="form-group">     
                  <label class="col-xs-5">Order Type</label>
                  <label class="col-xs-2">Shipping Type</label>
                  <label class="col-xs-2">Box Quantity</label>
                  <div class="col-xs-3 text-left"></div>                                               
                  </div>      
                  <div class="form-group">                                             
                    <div class="col-xs-5 text-left">                      
                      <label class="col-xs-4 k-nopad-left" ng-repeat="type in order_types" >                        
                        <input type="radio" ng-model="thisItem.order_type" name="order_type" value="{{type}}">
                          {{type}}
                      </label>                                      

                    </div>                
                    <div class="col-xs-2 text-left">
                      <label class="col-xs-6 k-nopad-left">
                        <input type="radio" name="ship_type" id="ship_type" ng-model="thisItem.ship_type" value="D2D">
                        D2D
                      </label>                                      
                      <label class="col-xs-6 k-nopad-left">
                        <input type="radio" name="ship_type" id="ship_type" ng-model="thisItem.ship_type" value="A2A">
                        A2A
                      </label>                                      
                    </div>              
                    <div class="col-xs-2 text-left">
                      <input type="text" only-digits min="1" ng-model="thisItem.box_qty" data-bv-integer-message="Required" class="form-control" 
                      id="box_qty"  name="box_qty" placeholder="Box Quantity">
                    </div>                          
                    <div class="col-xs-3 text-left"></div>                                               
                  </div>                                                                                 
                  <div class="col-xs-12 text-left"></div>                                                                                            
                  <div class="clear"></div>
                  <div class="col-xs-12 text-left"><hr/></div>
                  <!--Shipping price-->
                  <div class="form-group">                                
                    <label class="col-xs-3 text-left">Total Weight</label>
                    <label class="col-xs-3 text-left">Shipping Fee/lbs</label>
                    <label class="col-xs-3 text-left">Shipping Discount</label>
                    <label class="col-xs-3 text-left">Total Shipping Fee</label>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-3">
                      <input type="text" only-digits allow-decimal="true" ng-model="thisItem.total_wt_lbs" 
                      ng-change="updateOrder()" class="form-control" id="total_wt_lbs" name="total_wt_lbs" 
                      placeholder="Weight (Pound)">
                    </div>
                    <div class="col-xs-3">
                      <input type="text" only-digits allow-decimal="true" ng-model="thisItem.ship_fee_per_lbs" 
                      ng-change="updateOrder()" class="form-control" id="ship_fee_lbs" name="ship_fee_lbs" 
                      placeholder="Fee/lbs">
                    </div>
                    <div class="col-xs-3">
                      <input type="text" only-digits min="0" max="99" ng-model="thisItem.ship_discount" class="form-control" 
                      ng-change="updateOrder()" id="ship_discount" name="ship_discount" 
                      placeholder="Discount">
                    </div>              
                    <div class="col-xs-3">
                      <input type="text" class="form-control" readonly ng-model="thisItem.total_ship_fee">
                    </div>
                  </div>
                  <div class="col-xs-12 text-left"></div>                                                                                            
                  <div class="clear"></div>
                  <div class="col-xs-12 text-left"><hr/></div>
                  <!--Total order value: sum(shipping fee * discount, airport fee * discount)-->
                  <div class="form-group">
                    <div class="col-xs-10">
                      <input type="text" ng-model="thisItem.delivery_instruction" name="delivery_instruction" placeholder="Delivery Instruction" class='form-control'/>
                    </div> 
                    <label class="col-xs-2 text-right k-total-order">${{thisItem.total | number:2}}</label>
                  </div>                            
                </div>                  
              </section>
              <!--Submit Button-->
              <div class="col-xs-1"><button class="btn btn-success" ng-click="exportOrder(thisItem.ship_order_id)" style="min-width:80px;">Export</button></div>
              <div class="col-xs-offset-3 col-xs-8 text-right" style="padding-bottom: 1em;">
                <button type="reset" class="btn btn-info" style="min-width:80px;">Reset</button>
                <button class="btn btn-success" style="min-width:80px; margin-left:10px;" ng-click="sendOrder()">Submit</button>
              </div>
            </div>
          </form>
      </div>  
    </section>
  </section>
</section>
