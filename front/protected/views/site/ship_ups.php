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
                <h2 class="color-white mt0">SHIP FROM UPS</h2>
                
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
                        <p class="mb20">You can ship your order to Cali Cargo through UPS with exclusive rate using Cali Cargo UPS label. Please provide your package information via the form below and we will send to your email an UPS label and UPS shipping rate:</p>

                        <form id="shipping_form_ups" class="form-horizontal text-center shipping-form" role="form" style="width:60%; margin-left: 15%;">
                            <div class="form-group">
                                <label class=" col-xs-12 control-label title-label">SHIPPING INFORMATION</label>
                            </div>                            
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Full Name</label>
                                <div class="col-xs-8">
                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                                </div> 
                            </div>
                            <div class="form-group">                                                                    
                                <div class="col-xs-8 col-xs-offset-3">
                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name">
                                </div>                                
                            </div>
                            <div class="form-group">                                                                    
                                <div class="col-xs-8 col-xs-offset-3">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                                </div>                                
                            </div>                            
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Telephone</label>
                                <div class="col-xs-8">
                                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Telephone">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Email</label>
                                <div class="col-xs-8">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Box Size</label>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" id="height" name="height" placeholder="Height">
                                </div> 
                            </div>      
                            <div class="form-group">                               
                                <div class="col-xs-8 col-xs-offset-3">
                                    <input type="text" class="form-control" name="length" id="length" placeholder="Length">
                                </div>
                            </div> 
                            <div class="form-group">       
                                <div class="col-xs-8 col-xs-offset-3">
                                    <input type="text" class="form-control" id="depth" name="depth" placeholder="Depth">
                                </div>
                            </div>                           
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Weight</label>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight">
                                </div>                                
                            </div>     
                            <div class="form-group">
                                <label class="col-xs-3 control-label">Note</label>
                                <div class="col-xs-8">
                                    <textarea class="form-control" rows="3" name="note"></textarea>
                                </div>                                
                            </div>                       
                          
                            <div class="form-group mb0">
                                <div class="col-xs-11 text-right">
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
                            <li class="active"><a href="./ship-through-ups"><i class="fa fa-angle-double-right"></i> Ship through UPS</a></li> 
                            <li><a href="./order-from-amazon"><i class="fa fa-angle-double-right"></i> Order from Amazon</a></li>                                     
                        </ul>
                    </div>

                </div>                             
            </div>        
        </div>
    </div>