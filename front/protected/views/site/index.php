<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <!-- Begin Slideshow -->
    <div class="slideshow-container style-1">
        <div class="slideshow-inner">
            <ul>

                

                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="8" data-masterspeed="500" >

                    <!-- MAIN IMAGE -->
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slideshow/slide-2/bg.jpg"  alt=""  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                    <!-- LAYER -->
                    <div class="tp-caption sft stt"
                        data-x="0"
                        data-y="120"
                        data-speed="800"
                        data-start="500"
                        data-easing="Back.easeOut"
                        data-endspeed="200"
                        data-endeasing="Power4.easeIn"
                        data-captionhidden="on"
                        style="z-index: 10"><h3 class="tp-resizeme color-orange">WE DELIVER WITH CARE</h3>
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption sfl stl"
                        data-x="1"
                        data-y="220"
                        data-speed="800"
                        data-start="900"
                        data-easing="Back.easeOut"
                        data-endspeed="200"
                        data-endeasing="Power4.easeIn"
                        data-captionhidden="on"
                        style="z-index: 10">
                        <p class="tp-resizeme color-blue sub-title thin">
                            Calicargo is one of the most effective ways<br/>to buy and ship items from US to Vietnam<br/>for your loved ones.
                        </p>
                    </div>
					<!-- LAYER -->
                    <div class="tp-caption sfb stb"
                        data-x="1"
                        data-y="320"
                        data-speed="800"
                        data-start="1400"
                        data-easing="Power1.easeOut"
                        data-endspeed="200"
                        data-endeasing="Power1.easeOut"
                        data-captionhidden="on"
                        style="z-index: 10">
                        <a href="./ship-at-calicargo" class="tp-resizeme button-outline color-white  border-orange bg-orange  hover-bg-accent hover-border-accent">SHIPPING SERVICES</a>
                        
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption sfb stb"
                        data-x="200"
                        data-y="320"
                        data-speed="800"
                        data-start="1550"
                        data-easing="Power1.easeOut"
                        data-endspeed="200"
                        data-endeasing="Power1.easeOut"
                        data-captionhidden="on"
                        style="z-index: 10">
                        <a href="https://www.facebook.com/TrendyUSvn" class="tp-resizeme button-outline color-white border-orange bg-orange hover-bg-accent hover-border-accent">OUT STORE</a>
                        
                    </div>
                   

                </li>

                

            </ul>
        </div>
    </div>
    <!-- End Slideshow -->


    <div class="grid-row bg-lightgray">
        <div class="content-inner">

            <div class="divider20"></div>
			<h3 class="text-center mt10">Why Cali Cargo?</h3>
            <span class="sub-title text-center"> CaliCargo is committed to providing dedicated, personalised service. Your schedules drive our solutions!</span>
            <div class="divider30"></div>
  		</div>
 	</div>                 
    <div class="grid-row">
        <div class="content-inner">
        	<div class="divider30"></div>
        	<h3 class="light text-center">Our Services</h3>
           
            <div class="one-fifth animated" data-animation="fadeInDown" data-animation-delay="0">
                <div class="icon-box-1">
                    <i class="fa fa-gift"></i>
                    <div class="divider40"></div>                    
                    <h5 class="color-blue"><strong>Ship at Cali Cargo</strong></h5>
                    <p>We can help ship your merchandise to your home in Vietnam with reasonable cost and delivery time.</p>
                    <div class="divider20"></div>
                    <a href="#price-modal" data-toggle="modal" data-target="#price-modal" class="button-small hover-bg-orange hover-border-orange last-col  rounded bg-green border-green">VIEW SHIPPING FEE</a>
                </div>
            </div>
            <div class="one-fifth animated" data-animation="fadeInDown" data-animation-delay="350">
                <div class="icon-box-1">
                    <i class="fa fa-plane"></i>
                    <div class="divider40"></div>
                    <h5 class="color-blue"><strong>Ship from Amazon</strong></h5>
                    <p>You can ship your orders from Amzon and other websites to our office. We then ship them to Vietnam.</p>
                    <div class="divider20"></div>
                    <a href="./ship-from-amazon" class="button-small hover-bg-orange hover-border-orange last-col  rounded bg-green border-green">MAKE A REQUEST</a>
                </div>
            </div>
            <div class="one-fifth animated" data-animation="fadeInDown" data-animation-delay="700">
                <div class="icon-box-1">
                    <i class="fa fa-truck"></i>
                    <div class="divider40"></div>                    
                    <h5 class="color-blue"><strong>Ship through UPS</strong></h5>
                    <p>You can ship your order to Cali Cargo through UPS with exclusive rate using Cali Cargo UPS label.</p>
                    <div class="divider20"></div>                    
                    <a href="./ship-through-ups" class="button-small hover-bg-orange hover-border-orange last-col  rounded bg-green border-green">MAKE A REQUEST</a>
                    
                </div>
            </div>
            <div class="one-fifth animated" data-animation="fadeInDown" data-animation-delay="1050">
                <div class="icon-box-1">
                    <i class="fa fa-tags"></i>
                    <div class="divider40"></div>                    
                    <h5 class="color-blue"><strong>Order from Amazon</strong></h5>
                    <p>Send us list of products with website link or mall location. We can help order and ship them to your location.</p>
                    <div class="divider20"></div> 
                    <a href="#"  data-toggle="modal" data-target="#amazon-modal" class="button-small hover-bg-orange hover-border-orange last-col  rounded bg-green border-green">SEND YOUR ORDERS</a>
                </div>
            </div>
            <div class="one-fifth last-col animated" data-animation="fadeInDown" data-animation-delay="1400">
                <div class="icon-box-1">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="divider40"></div>
                    <h5 class="color-blue"><strong>Shop at Calicargo</strong></h5>
                    <p>Our shopping store has wide range of products with good price that can sastify your needs.</p>
                    <div class="divider20"></div> 
                    <a href="https://www.facebook.com/TrendyUSvn" target="_blank" class="button-small bg-primary hover-bg-orange img-rounded hover-border-orange last-col rounded bg-green border-green">VIEW OUR STORES</a>
                </div>
            </div>
            <div class="clear"></div>

        </div>
    </div>
    
    <a href="#" class="back-to-top fa fa-angle-up"></a>
    
