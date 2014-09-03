<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ship Cali';
$this->breadcrumbs=array(
    'Ship Cali',
    );
    ?>

        <div class="top-header">
        <div class="content-inner clearfix">

            <div class="heading-text">
                <h2 class="color-white mt0">SHIP AT CALI CARGO</h2>
                
            </div>              
        </div>
    </div>


    <div class="grid-row">
        <div class="content-inner">
            <div class="page-wrapper sidebar-right clearfix">
                <div class="page-container">
                    <div class="page-container">
                        <p class="divider20"></p>   
                        <p class="mb10"> We can help ship your merchandise to your home in Vietnam with reasonable cost and delivery time.</p>
                        <p class="mt0 mb0">You can ship your merchandise to our address:</p>
                        <p class="color-accent mt0 mb0"><strong>Cali Cargo - The global service</strong></p>
                        <p class="mt0 mb10">519 Montague Expy, Milpitas, CA 95035, USA</p>
                        <p>Cali Cargo's shipping fee:</p>
                        <div class="table-responsive" style="margin-right:20px;">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td class="bg-accent color-white text-center" colspan="3">
                                        <h6 class="color-white"  style="padding:5px; margin:0;">US CUSTOMERS (come directly to Cali Cargo Office)</h6>
                                    </td>                        
                                </tr>
                                <tr class="bg-info">
                                    <td>
                                        <span>Package Size</span>
                                    </td>
                                    <td>
                                        <span>Ho Chi Minh City</span>
                                    </td>                        
                                    <td>
                                        <span>Ha Noi & other provinces</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum 10lbs package</span>
                                    </td>
                                    <td>
                                        <span>$2.5/lb</span>
                                    </td>                        
                                    <td>
                                        <span> $3/lb to $4.5/lb</span>
                                    </td>                        
                                </tr>
                                
                                <tr>
                                    <td>
                                        <span>Package less than 10lbs: flat shipping rate (per package)</span>
                                    </td>
                                    <td>
                                        <span>$25/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$30 - $45/lb</span>
                                    </td>                        
                                </tr>
                                
                                <tr>
                                    <td class="bg-accent color-white text-center" colspan="3">
                                        <h6 class="color-white" style="padding:5px; margin:0;">VN CUSTOMERS</h6>
                                    </td>                        
                                </tr>
                                <tr class="bg-info" style="background:#d9edf7 !important;">
                                    <td class="bg-info" style="background:#d9edf7 !important;">
                                        <span>Package Size</span>
                                    </td>
                                    <td class="bg-info" style="background:#d9edf7 !important;">
                                        <span>Ho Chi Minh City</span>
                                    </td>                        
                                    <td class="bg-info" style="background:#d9edf7 !important;">
                                        <span>Ha Noi & other provinces</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum 10lbs package</span>
                                    </td>
                                    <td>
                                        <span>$3/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$4-5/lb</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>4-9 lbs</span>
                                    </td>
                                    <td>
                                        <span>$7/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$9/lb</span>
                                    </td>                        
                                </tr>
                                <tr>
                                    <td>
                                        <span>1-3 lbs</span>
                                    </td>
                                    <td>
                                        <span>$10/lb</span>
                                    </td>                        
                                    <td>
                                        <span>$12/lb</span>
                                    </td>                        
                                </tr>
                                
                            </table>
                            <p class="mt0 mb0"><em>Adding shipping surcharges to products in these categories: Electronics, Beauty & Fashion accessories.</em></p>
                            <p class="mt0"><b><em>Our currency conversion: 1 USD = 22,000 VND</em></b></p>
                            
                        </div>
                    </div>
                </div> 
                <div class="sidebar">
                    <div class="divider40"></div>
                    <div class="widget widget-categories">
                        <h5 class="mb0"><span>Shipping Services</span></h5>
                        <ul>
                            <li class="active"><a href="./ship-at-calicargo"><i class="fa fa-angle-double-right"></i> Ship at Cali Cargo</a></li>
                            <li><a href="./ship-from-amazon"><i class="fa fa-angle-double-right"></i> Ship from Amazon</a></li>                                    
                            <li><a href="./ship-through-ups"><i class="fa fa-angle-double-right"></i> Ship through UPS</a></li> 
                            <li><a href="./order-from-amazon"><i class="fa fa-angle-double-right"></i> Order from Amazon</a></li>                                     
                        </ul>
                    </div>

                </div>                             
            </div>        
        </div>
    </div>
    <div class="modal fade" id="price-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog sticky">
        <div class="modal-content">
        	<h4 class="text-center bg-orange color-white" style="margin-top:0;padding: 20px;">Cali Cargo Standard Shipping Fee</h4>
            <div class="table-responsive" style="padding:0 10px;">
                <table class="table table-bordered table-striped">
                	<tr>
                    	<td class="bg-accent color-white text-center" colspan="3">
                        	<h6 class="color-white"  style="padding:5px; margin:0;">US CUSTOMERS (come directly to Cali Cargo Office)</h6>
                       	</td>                        
                    </tr>
                    <tr class="bg-info">
                    	<td>
                        	<span>Package Size</span>
                        </td>
                    	<td>
                        	<span>Ho Chi Minh City</span>
                        </td>                        
                    	<td>
                        	<span>Ha Noi & other provinces</span>
                        </td>                        
                    </tr>
                    <tr>
                    	<td>
                        	<span>> 10 lbs</span>
                        </td>
                    	<td>
                        	<span>2.5$</span>
                        </td>                        
                    	<td>
                        	<span>4.5$</span>
                        </td>                        
                    </tr>
                    
                    <tr>
                    	<td>
                        	<span>4-9 lbs</span>
                        </td>
                    	<td>
                        	<span>7$</span>
                        </td>                        
                    	<td>
                        	<span>9$</span>
                        </td>                        
                    </tr>
                    <tr>
                    	<td>
                        	<span>1-3 lbs</span>
                        </td>
                    	<td>
                        	<span>10$</span>
                        </td>                        
                    	<td>
                        	<span>12$</span>
                        </td>                        
                    </tr>
                    <tr>
                    	<td class="bg-accent color-white text-center" colspan="3">
                        	<h6 class="color-white" style="padding:5px; margin:0;">VN CUSTOMERS</h6>
                       	</td>                        
                    </tr>
                    <tr class="bg-info" style="background:#d9edf7 !important;">
                    	<td class="bg-info" style="background:#d9edf7 !important;">
                        	<span>Package Size</span>
                        </td>
                    	<td class="bg-info" style="background:#d9edf7 !important;">
                        	<span>Ho Chi Minh City</span>
                        </td>                        
                    	<td class="bg-info" style="background:#d9edf7 !important;">
                        	<span>Ha Noi & other provinces</span>
                        </td>                        
                    </tr>
                    <tr>
                    	<td>
                        	<span>> 10 lbs</span>
                        </td>
                    	<td>
                        	<span>3$</span>
                        </td>                        
                    	<td>
                        	<span>4-5$</span>
                        </td>                        
                    </tr>
                    <tr>
                    	<td>
                        	<span>4-9 lbs</span>
                        </td>
                    	<td>
                        	<span>7$</span>
                        </td>                        
                    	<td>
                        	<span>9$</span>
                        </td>                        
                    </tr>
                    <tr>
                    	<td>
                        	<span>1-3 lbs</span>
                        </td>
                    	<td>
                        	<span>10$</span>
                        </td>                        
                    	<td>
                        	<span>12$</span>
                        </td>                        
                    </tr>
                    
                </table>
                <p class="mt0 mb0 text-center"><em>Adding shipping surcharges to products in these categories: Electronics, Beauty & Fashion accessories.</em></p>
                <p class="text-center mt0"><b><em>Our currency converter: 1$ = 22,000 VND</em></b></p>
                
            </div>
        </div>
      </div>
    </div>
	
    <div class="modal fade" id="amazon-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog sticky">
        <div class="modal-content" style="padding:10px;">
        	<h4 class="text-center bg-orange color-white" style="margin-top:0;padding: 10px;"><i class="fa fa-tags"></i> Order From Amazon</h4>
            <div class="divider10"></div>
            <div class="modal-body" style="padding:10px;">
                <p style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:8px;">Send us list of products you want to buy with link to website or mall location using our order FORM (click the link below). We can help order and ship them to your location.</p>      
    			<p class="text-info" style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:8px;">Order fee is 10% if your order is less than $200</p>
				<p class="text-danger" style="border-bottom:solid 1px #ccc; padding-bottom:8px;margin-bottom:12px;">5% if your order is more than $200</p>
                <p class="text-center" style="margin-bottom:0;"><a href="ship_order.html" class="button-small hover-bg-orange hover-border-orange bg-green border-green last-col rounded">ORDER FORM</a></p>
            </div>
            
        </div>
      </div>
    </div>