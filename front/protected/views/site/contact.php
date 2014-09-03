<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
	);
	?>

	<div class="grid-row">

		<div id="map-1" class="map-container"></div>

		<div class="content-inner">

			<div class="divider60"></div>

			<div class="contact-widget widget-info one-third">
				<h5 class="color-accent">Cali Cargo - The global service</h5>
				<p>519 Montague Expy, Milpitas, CA 95035</p>
				<div class="divider10"></div>   
				<hr/>
				<div class="divider10"></div>   
				<h5 class="color-accent mt0">Contact information</h5>
				<p>Email: <a href="mailto:info@calicargo.com">info@calicargo.com</a></p>				
				<p>Phone: (408) 719-8000</p>
				<p>Fax: (844) 272-0230</p>
				<div class="divider10"></div>  
				<hr/>
				<div class="divider10"></div>   
				<h5 class="color-accent mt0">Our services</h5>
				<p>
					<a href="./ship-at-calicargo" class="color-black hover-color-accent" style="margin-right:30px;"><i class="fa fa-angle-double-right"></i> Ship at Cali Cargo</a>
					<a href="./ship-from-amazon" class="color-black hover-color-accent"><i class="fa fa-angle-double-right"></i> Ship from Amazon</a>    
				</p>
				<p>
					<a href="./ship-through-ups" class="color-black hover-color-accent" style="margin-right:30px;"><i class="fa fa-angle-double-right"></i> Ship through UPS</a>
					<a href="./order-from-amazon" class="color-black hover-color-accent"><i class="fa fa-angle-double-right"></i> Order from Amazon</a>
				</p>
				<div class="divider10"></div>  
				<hr/>
				<div class="divider10"></div>   
				<h5 class="color-accent mt0">Our store</h5>
				<p>
					<!--<a href="#" class="color-black hover-color-accent" style="margin-right:30px;"><i class="fa fa-angle-double-right"></i> Online store</a>-->
					<a href="https://www.facebook.com/TrendyUSvn" class="color-black hover-color-accent"><i class="fa fa-angle-double-right"></i> Facebook</a>
				</p>
				
				
			</div>
			<div class="two-third last-col">
				<div class="flexslider" id="about-slider">
					<ul class="slides">
						<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about01.jpg" alt="about_01"></li>
					</ul>
				</div>            
			</div>
			

		</div>

	</div>
