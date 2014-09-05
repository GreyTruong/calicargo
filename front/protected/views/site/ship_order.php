<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Order Amazon';
$this->breadcrumbs=array(
    'Order Amazon',
    );
    ?>

        <div class="top-header">
        <div class="content-inner clearfix">

            <div class="heading-text">
                <h2 class="color-white mt0">ORDER FROM AMAZON & OTHER WEBSITES</h2>
                
            </div>              
        </div>
    </div>


    <div class="grid-row">
        <div class="content-inner">
            <div class="page-wrapper sidebar-right clearfix">
				<div class="page-container notification-box" id="success-notification"><p class="bg-success">AN EMAIL HAS BEEN SENT. PLEASE CHECK YOUR MAIL BOX FOR MORE INFORMATION</p></div>
                <div class="page-container notification-box" id="failure-notification"><p class="bg-warning">SOMETHING WENT WRONG. PLEASE TRY AGAIN</p></div>            
                <div class="page-container">
                    <div class="page-container">
                        <p class="divider20"></p>   
                        <p style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:8px;">Send us list of products you want to buy with link to website or mall location via the form below. We can help order and ship them to your location.</p>      
                <p class="text-info" style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:8px;">Order fee is 10% if your order is less than $200</p>
                <p class="text-danger mb20" style="border-bottom:solid 1px #ccc; padding-bottom:8px;">5% if your order is more than $200</p>

                        <form id="order_amazon_form" class="form-horizontal text-center shipping-form" role="form">
                            <div class="form-group">
                                <label class=" col-xs-12 control-label title-label">SENDER INFORMATION</label>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Full Name</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                                </div>  
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name">
                                </div>                                                              
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Address</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                </div>                                
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col-xs-offset-2 col-xs-4">
                                    <input type="text" class="form-control" name="state" id="state" placeholder="State">
                                </div>                                
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="code" id="code" placeholder="Zip Code">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="country" id="country" placeholder="Country">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-xs-2 control-label">Contact</label>
                                <div class="col-xs-5">
                                    <input type="tel" class="form-control" name="tel" id="tel" placeholder="Telephone">
                                </div>                                                              
                                <div class="col-xs-5">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 control-label title-label">VIETNAM RECEIVER INFORMATION</label>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Full Name</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="firstname2" id="firstname2" placeholder="First Name">
                                </div>                                                              
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="middlename2" name="middlename2" placeholder="Middle Name">
                                </div>                                              
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="lastname2" name="lastname2" placeholder="Last Name">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Address</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Address">
                                </div>                                
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="city2" name="city2" placeholder="City">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class=" col-xs-offset-2 col-xs-4">
                                    <input type="text" class="form-control" name="state2" id="state2" placeholder="State">
                                </div>                                
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="code2" id="code2" placeholder="Zip Code">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="country2" id="country2" placeholder="Country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Contact</label>
                                <div class="col-xs-5">
                                    <input type="tel" class="form-control" name="tel2" id="tel2" placeholder="Telephone">
                                </div>                                                              
                                <div class="col-xs-5">
                                    <input type="email" class="form-control" name="email2" id="email2" placeholder="Email">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 control-label title-label">ITEM LIST</label>
                            </div>
                            <div class="form-group">   
                                <label class="col-xs-2 control-label">Item 1</label>                             
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="item_link1" id="item1" placeholder="Item link">
                                </div>                                                              
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" name="item_qty1" id="qty1" placeholder="Quantity">
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" name="item_size1" id="size1" placeholder="Size">
                                </div>  
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" name="item_color1" id="color1" placeholder="Color">
                                </div>                                  
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-xs-12 text-right">
                                    <a href="#" id="more-order-item" data-id="1">Add more item</a>
                                    <input type="hidden" value="1" name="total_item" id="total_item" />
                                </div>
                            </div>
                            
                            
                          
                            <div class="form-group mb0">
                                <div class="col-xs-12 text-right">
                                  <button type="reset" class="btn btn-info" style="min-width:80px;">Reset</button>                              
                                  <button type="submit" class="btn btn-success" style="min-width:80px; margin-left:10px;">Send</button>
                                </div>
                            </div>
                        </form>
                        <div class="divider40"></div>
                        
                    </div>
                </div> 
                <div class="sidebar">
                    <div class="divider40"></div>
                    <div class="widget widget-categories">
                        <h5 class="mb0"><span>Shipping Services</span></h5>
                        <ul>
                            <li><a href="./ship-at-calicargo"><i class="fa fa-angle-double-right"></i> Ship at Cali Cargo</a></li>
                            <li><a href="./ship-from-amazon"><i class="fa fa-angle-double-right"></i> Ship from Amazon</a></li>                                    
                            <li><a href="./ship-through-ups"><i class="fa fa-angle-double-right"></i> Ship through UPS</a></li> 
                            <li class="active"><a href="./order-from-amazon"><i class="fa fa-angle-double-right"></i> Order from Amazon</a></li>                                     
                        </ul>
                    </div>

                </div>                             
            </div>        
        </div>
    </div>