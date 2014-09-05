<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ship Amazon';
$this->breadcrumbs=array(
	'Ship Amazon',
	);
	?>


    <div class="grid-row">
        <div class="content-inner">
            <div class="page-wrapper clearfix">      
                <div class="page-container notification-box" id="success-notification"><p class="bg-success">INFORMATION HAS BEEN UPDATED</p></div>                          
                <div class="page-container" id="shipping-form-main-panel">
                    <div class="page-container">
                        <p class="mb20"><h5>ORDER #<?php echo $order['ship_order_id'] ?></h5></p>
                        <input type="hidden" value="<?php echo $order['ship_order_id'] ?>" name="ship_order_id" id="ship_order_id" />
                        <input type="hidden" value="<?php HelperUrl::BaseUrl(); ?>" id="base-url" />
                        <form id="update_order" class="form-horizontal shipping-form" role="form">
                            <div class="form-group">
                                <label class=" col-xs-12 title-label">SENDER INFORMATION</label>
                            </div>
                            
                            <?php 
                                if ($order['order_type'] != 'ship_amazon') $is_amazon_disabled = 'disabled'; 
                                else $is_amazon_disabled = '';
                            ?>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Amazon Shipping Info</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" <?php echo $is_amazon_disabled ?> name="number" value="<?php echo $order['track_number'] ?>" id="number" placeholder="Tracking number of your order">
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" <?php echo $is_amazon_disabled ?> name="carrier" value="<?php echo $order['ship_carrier'] ?>"  id="carrier" placeholder="Shipping Carrier (if known)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Full Name</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="firstname" value="<?php echo $order['sender_first_name'] ?>" id="firstname" placeholder="First Name">
                                </div> 
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="middlename" value="<?php echo $order['sender_middle_name'] ?>" id="middlename" placeholder="Middle Name (optional)">
                                </div>                                                             
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="lastname" value="<?php echo $order['sender_last_name'] ?>" id="lastname" placeholder="Last Name & Middle Name">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Address</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="address" value="<?php echo $order['sender_address'] ?>" id="address" placeholder="Address">
                                </div>                                
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="city" value="<?php echo $order['sender_city'] ?>" id="city" placeholder="City">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col-xs-offset-2 col-xs-4">
                                    <input type="text" class="form-control" name="state" value="<?php echo $order['sender_state'] ?>" id="state" placeholder="State">
                                </div>                                
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="code" value="<?php echo $order['sender_zipcode'] ?>" id="code" placeholder="Zip Code">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="country" value="<?php echo $order['sender_country'] ?>" id="country" placeholder="Country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Contact</label>
                                <div class="col-xs-5">
                                    <input type="tel" class="form-control" name="tel" value="<?php echo $order['sender_tel'] ?>" id="tel" placeholder="Telephone">
                                </div>                                                              
                                <div class="col-xs-5">
                                    <input type="email" class="form-control" name="email" value="<?php echo $order['sender_email'] ?>" id="email" placeholder="Email">
                                </div>                                
                            </div>                            
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Note</label>
                                <div class="col-xs-10">
                                    <textarea class="form-control" rows="3" name="note"><?php echo $order['sender_note'] ?></textarea>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 title-label">VIETNAM RECEIVER INFORMATION</label>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Full Name</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="firstname2" value="<?php echo $order['receiver_first_name'] ?>" id="firstname2" placeholder="First Name">
                                </div>      
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="middlename2" value="<?php echo $order['receiver_middle_name'] ?>" id="middlename2" placeholder="Middle Name (optional)">
                                </div>                                                                                                      
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="lastname2" value="<?php echo $order['receiver_last_name'] ?>" id="lastname2" placeholder="Last Name">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Address</label>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="address2" value="<?php echo $order['receiver_address'] ?>" id="address2" placeholder="Address">
                                </div>                                
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="city2" value="<?php echo $order['receiver_city'] ?>" id="city2" placeholder="City">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class=" col-xs-offset-2 col-xs-4">
                                    <input type="text" class="form-control" name="state2" value="<?php echo $order['receiver_state'] ?>" id="state2" placeholder="State">
                                </div>                                
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="code2" value="<?php echo $order['receiver_zipcode'] ?>" id="code2" placeholder="Zip Code">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" name="country2" value="<?php echo $order['receiver_country'] ?>" id="country2" placeholder="Country">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Contact</label>
                                <div class="col-xs-5">
                                    <input type="tel" class="form-control" name="tel2" value="<?php echo $order['receiver_tel'] ?>" id="tel2" placeholder="Telephone">
                                </div>                                                              
                                <div class="col-xs-5">
                                    <input type="email" class="form-control" name="email2" value="<?php echo $order['receiver_email'] ?>" id="email2" placeholder="Email">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Note</label>
                                <div class="col-xs-10">
                                    <textarea class="form-control" rows="3" name="note2"><?php echo $order['receiver_note'] ?></textarea>
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 title-label">ORDER INFORMATION</label>
                            </div>                            
                            
                            <div class="form-group">                                
                                <label class="col-xs-2 k-control-label">Order type</label>
                                <div class="col-xs-2">
                                    <span class="k-uppercase"><?php echo $order['order_type'] ?></span>                                   
                                </div>                
                                <label class="col-xs-2 k-control-label">Box Quantity</label>
                                <div class="col-xs-2">
                                      <input type="number" data-bv-integer-message="Required" value = "<?php echo $order['box_qty'] ?>" class="form-control" id="qty"  name="qty" placeholder="Quantity">
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 title-label">ITEM INFORMATION</label>
                            </div>
                            
                            <?php 
                                if ($order['order_type'] == 'order_amazon'){                                
                            ?>
                            <div class="form-group">   
                                <label class="col-xs-2 k-control-label"></label>                                                             
                                <label class="col-xs-2 k-control-label">Quantity</label>       
                                <label class="col-xs-2 k-control-label">Size</label>       
                                <label class="col-xs-2 k-control-label">Color</label>       
                                <label class="col-xs-2 k-control-label">Value</label>       
                                <label class="col-xs-2 k-control-label">Airport Fee</label>       
                            </div>                                                                                                            
                            <input type="hidden" value="<?php echo count($item_list); ?>" id="item-count" />               
                            <?php 
                                for ($i = 0; $i < count($item_list); $i++) {
                                    $item = $item_list[$i];
                            ?>

                            <div class="form-group">   
                                <label class="col-xs-2 k-control-label"><a href="<?php echo $item['item_link'] ?>">Go to item page</a></label>                                                             
                                <div class="col-xs-2">
                                    <input type="number" readonly class="form-control" value = '<?php echo $item['qty'] ?>' name="item_qty<?php echo $i ?>" id="qty<?php echo $i ?>" placeholder="Quantity">
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" readonly class="form-control" value = '<?php echo $item['size'] ?>' name="item_size<?php echo $i ?>" id="size<?php echo $i ?>" placeholder="Size">
                                </div>  
                                <div class="col-xs-2">
                                    <input type="text" readonly class="form-control" value = '<?php echo $item['color'] ?>' name="item_color<?php echo $i ?>" id="color<?php echo $i ?>" placeholder="Color">
                                </div>                                  
                                <div class="col-xs-2">
                                      <input type="number" data-bv-integer-message="Required" value = '<?php echo $item['value'] ?>' class="item_val form-control" id="item_value<?php echo $i ?>"  name="item_value<?php echo $i ?>" placeholder="Item Value 1">
                                </div>
                                <div class="col-xs-2">
                                      <input type="number" data-bv-integer-message="Required" value = '<?php echo $item['airport_fee'] ?>' class="item_val form-control" id="item_airport_fee<?php echo $i ?>"  name="item_airport_fee<?php echo $i ?>" placeholder="Item Airport Fee 1">
                                </div>
                            </div>
                            <?php                                      
                                }
                            ?>                            

                            <?php        
                                }
                                else{
                            ?>       

                            <div class="form-group">   
                                <label class="col-xs-2 k-control-label"></label>                                                             
                                <label class="col-xs-2 k-control-label"></label>       
                                <label class="col-xs-2 k-control-label"></label>       
                                <label class="col-xs-2 k-control-label"></label>       
                                <label class="col-xs-2 k-control-label">Order Value</label>       
                                <label class="col-xs-2 k-control-label">Airport Fee</label>       
                            </div>                                                                                

                            <?php } ?>                                                                         

                            
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label text-right"></label>
                                <label class="col-xs-2 k-control-label text-right">Discount</label>
                                <div class="col-xs-2">
                                      <input type="number" maxlength="2" min="0" max="99" data-bv-integer-message="Required" value="<?php echo $order['order_discount'] ?>" class="item_val form-control" id="total_discount"  name="total_discount" placeholder="Total Discount">
                                </div>
                                <label class="col-xs-2 k-control-label text-right">Total</label>
                                <div class="col-xs-2">
                                      <input type="number" data-bv-integer-message="Required" class="form-control" id="total_value" value="<?php echo $order['total_value'] ?>" name="total_value" placeholder="Total Value">
                                </div>
                                <div class="col-xs-2">
                                      <input type="number" data-bv-integer-message="Required" class="form-control" id="total_airport_fee" value="<?php echo $order['total_airport_fee'] ?>" name="total_airport_fee" placeholder="Total Airport Fee">
                                </div>
                            </div>                                                    

                            <?php 
                                if ($order['order_type'] == 'order_amazon'){                                
                            ?>
                            
                            <div class="form-group">
                                <label class="col-xs-8 k-control-label text-right">Amazon Order Fee</label>
                                <div class="col-xs-4">
                                      <input type="number" data-bv-integer-message="Required" class="form-control" id="order_fee" value="<?php echo $order['order_fee'] ?>"  name="order_fee" placeholder="Order Fee">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="col-xs-12 text-right">
                                    <a href="#" id="more-order-item" data-id="1">Add more item</a>
                                    <input type="hidden" value="1" name="total_item" id="total_item" />
                                </div>
                            </div> -->
                            <?php } ?>


                            <div class="form-group">
                                <label class="col-xs-12 title-label">UPS BOX INFORMATION</label>
                            </div>
                            <?php 
                                if ($order['order_type'] != 'ship_ups') $is_ups_disabled = 'disabled'; 
                                else $is_ups_disabled = '';
                            ?>
                            <div class="form-group">   
                                <label class="col-xs-2 k-control-label"></label>                                                             
                                <label class="col-xs-2 k-control-label">Weight</label>       
                                <label class="col-xs-2 k-control-label">Height</label>       
                                <label class="col-xs-2 k-control-label">Length</label>       
                                <label class="col-xs-2 k-control-label">Depth</label>       
                            </div>                                                                                
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Ups Box</label>
                                <div class="col-xs-2">
                                      <input type="number" <?php echo $is_ups_disabled ?> data-bv-integer-message="Required" value="<?php echo $order['ups_box_w'] ?>" class="form-control" id="weight"  name="weight" placeholder="Weight">
                                </div>
                                <div class="col-xs-2">
                                      <input type="number" <?php echo $is_ups_disabled ?> data-bv-integer-message="Required" value="<?php echo $order['ups_box_h'] ?>" class="form-control" id="height"  name="height" placeholder="Height">
                                </div>
                                <div class="col-xs-2">
                                      <input type="number" <?php echo $is_ups_disabled ?> data-bv-integer-message="Required" value="<?php echo $order['ups_box_l'] ?>" class="form-control" id="length"  name="length" placeholder="Length">
                                </div>
                                <div class="col-xs-2">
                                      <input type="number" <?php echo $is_ups_disabled ?> data-bv-integer-message="Required" value="<?php echo $order['ups_box_d'] ?>" class="form-control" id="depth"  name="depth" placeholder="Depth">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 title-label">SHIPPING INFORMATION</label>
                            </div>

                            <?php
                                $is_d2d = $is_a2a = '';
                                if( strtolower($order["ship_type"])== strtolower('D2D') ) $is_d2d = 'checked';
                                else $is_a2a = 'checked';
                            ?>
                            <div class="form-group">
                                <label class="col-xs-2 k-control-label">Shipping type</label>
                                <div class="col-xs-2">
                                      <label>
                                        <input type="radio" name="ship_type" id="ship_type" value="D2D" <?php echo $is_d2d ?> >
                                        D2D
                                      </label>                                      
                                      <label>
                                        <input type="radio" name="ship_type" id="ship_type" value="A2A" <?php echo $is_a2a ?>>
                                        A2A
                                      </label>                                      
                                </div>                                                                                
                            </div>
                            <div class="form-group">                                
                                <label class="col-xs-2 k-control-label">Total Weight</label>
                                <div class="col-xs-2">
                                      <input type="number" class="ship-cal" data-bv-integer-message="Required" class="form-control" id="total_wt_lbs" value="<?php echo $order['total_wt_lbs'] ?>"  name="total_wt_lbs" placeholder="Total Weight (Pound)">
                                </div>
                                <label class="col-xs-2 k-control-label">Shipping Fee/lbs</label>
                                <div class="col-xs-2">
                                      <input type="number" class="ship-cal" data-bv-integer-message="Required" class="form-control" id="ship_fee_lbs" value="<?php echo $order['ship_fee_per_lbs'] ?>" name="ship_fee_lbs" placeholder="Shipping Fee/lbs">
                                </div>
                                <label class="col-xs-2 k-control-label">Shipping Discount</label>
                                <div class="col-xs-2">
                                      <input type="number" class="ship-cal" data-bv-integer-message="Required" class="form-control" id="ship_discount" value="<?php echo $order['ship_discount'] ?>" name="ship_discount" placeholder="Shipping Discount">
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="col-xs-8"></label>                                
                                <label class="col-xs-2 k-control-label">Total Shipping Fee</label>
                                <div class="col-xs-2">
                                      <span id="total_ship_fee">$<?php echo $order['total_ship_fee'] ?></span>
                                </div>                                
                            </div>
                          
                            <div class="form-group mb0">
                                <div class="col-xs-4 text-left">
                                  <button id="export-order" class="btn btn-info" style="min-width:80px;">Export Invoice</button>                              
                                </div>
                                <div class="col-xs-8 text-right">
                                  <button type="reset" class="btn btn-info" style="min-width:80px;">Reset</button>                              
                                  <button type="submit" class="btn btn-success" style="min-width:80px; margin-left:10px;">Update</button>
                                </div>
                            </div>
                        </form>
                        <div class="divider40"></div>                    
                    </div>
                </div> 
                
            </div>        
        </div>
    </div>

