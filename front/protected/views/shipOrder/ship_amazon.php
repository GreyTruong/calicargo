<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ship Amazon';
$this->breadcrumbs=array(
	'Ship Amazon',
	);
	?>

	    <div class="top-header">
        <div class="content-inner clearfix">

            <div class="heading-text">
                <h2 class="color-white mt0">SHIP FROM AMAZON & OTHER WEBSITES</h2>
                
            </div>              
        </div>
    </div>


    <div class="grid-row">
        <div class="content-inner">
            <div class="page-wrapper sidebar-right clearfix">                
                <div class="page-container notification-box" id="success-notification"><p class="bg-success">AN EMAIL HAS BEEN SENT. PLEASE CHECK YOUR MAIL BOX FOR MORE INFORMATION</p></div>
                <div class="page-container notification-box" id="failure-notification"><p class="bg-warning">SOMETHING WENT WRONG. PLEASE TRY AGAIN</p></div>
                <div class="page-container" id="shipping-form-main-panel">
                    <div class="page-container">
                        <p class="divider20"></p>   
                        <p class="mb20">You can ship your orders from Amazon and other websites to our office. We then ship them to Vietnam. Please fill out the form below and we then will contact you as soon as possible:</p>

                        <form id="shipping_form_amazon" class="form-horizontal text-center shipping-form" role="form">
                            <div class="form-group">
                                <label class=" col-xs-12 control-label title-label">SENDER INFORMATION</label>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Shipping Info</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" name="number" id="number" placeholder="Tracking number of your order">
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" name="carrier" id="carrier" placeholder="Shipping Carrier (if known)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Full Name</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                                </div> 
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name (optional)">
                                </div>                                                             
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name & Middle Name">
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
                                <label class="col-xs-2 control-label">Note</label>
                                <div class="col-xs-10">
                                    <textarea class="form-control" rows="3" name="note"></textarea>
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
                                    <input type="text" class="form-control" name="middlename2" id="middlename2" placeholder="Middle Name (optional)">
                                </div>                                                                                                      
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="lastname2" id="lastname2" placeholder="Last Name">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Address</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Address">
                                </div>                                
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="city2" id="city2" placeholder="City">
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
                                <label class="col-xs-2 control-label">Note</label>
                                <div class="col-xs-10">
                                    <textarea class="form-control" rows="3" name="note2"></textarea>
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
                            <li class="active"><a href="./ship-from-amazon"><i class="fa fa-angle-double-right"></i> Ship from Amazon</a></li>                                    
                            <li><a href="./ship-through-ups"><i class="fa fa-angle-double-right"></i> Ship through UPS</a></li> 
                            <li><a href="./order-from-amazon"><i class="fa fa-angle-double-right"></i> Order from Amazon</a></li>                                     
                        </ul>
                    </div>

                </div>                             
            </div>        
        </div>
    </div>

    <script>

    </script>