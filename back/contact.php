<?php 	
 	$url = Yii::app()->request->requestUri;
  	if (strpos($url,'/vi/') == false){ 
 ?>
<div class="contactsection en">
    <div class="w-container contactcontainer">
      <div class="mainheadline contact">We'd love to hear from you</div>
      <div class="w-row contactrow">
        <div class="w-col w-col-6 contactcol1">
          <div class="w-form contactform-wrapper">
              <form class="contactform" id="email-form" method="POST" name="email-form" data-name="Email Form">
              <label class="contactform-label" for="name">Full Name</label>
              <input class="w-input form-textfield contactus" id="name" type="text" placeholder="Enter your name" name="name" data-name="Name" required>
              <label class="contactform-label" for="email">Email</label>
              <input class="w-input form-textfield contactus" id="email" type="email" placeholder="Enter your email address" name="email" data-name="Email" required>
              <label class="contactform-label" for="Note">Note</label>
              <textarea class="w-input form-textfield contactus contactnote" id="Note" placeholder="Please leave us your note here" name="Note" required data-name="Note"></textarea>
              <input class="w-button button submitform contact" type="submit" value="Submit" data-wait="Please wait...">
            </form>
            <div class="w-form-done">
              <p>Thank you! Your submission has been received!</p>
            </div>
            <div class="w-form-fail">
              <p>Oops! Something went wrong while submitting the form :(</p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6 contactcol2">
          <div class="main-cta-head contact">Contact Information</div>
          <div class="w-row contact-rightcol-row">
            <div class="w-col w-col-3 w-col-small-3 w-col-tiny-3 contact-rightcol-lcol">
              <div class="main-cta-sub contact">Address
                <br>
                <br>Email
                <br>Phone
                <br>Fax</div>
            </div>
            <div class="w-col w-col-9 w-col-small-9 w-col-tiny-9 contact-rightcol-rcol">
              <div class="main-cta-sub contact"><a class="linksemibold" target="_blank" href="https://goo.gl/maps/mhkHH">519 Montague Expressway<br xmlns="http://www.w3.org/1999/xhtml">Milpitas, CA 95035</a>
                <br><a class="linksemibold sub" target="_blank" href="mailto:info@calicargo.com?subject=Info%20Request">info@calicargo.com</a>
                <br><a class="linksemibold sub" href="tel:+14087198000">(408) 719-8000</a>
                <br>(844) 272-0230</div>
            </div>
          </div>
          <div class="w-widget w-widget-map googlemap" data-widget-latlng="37.399859,-121.928073" data-widget-style="roadmap" data-widget-zoom="12" data-widget-tooltip="Cali Cargo - The Global Service"></div>
        </div>
      </div>
    </div>
  </div>
  <?php } else{ ?>
  <div class="contactsection en">
	<div class="w-container contactcontainer">
      <div class="mainheadline contact">Chúng tôi rất vui được nghe từ bạn</div>
      <div class="w-row contactrow">
        <div class="w-col w-col-6 contactcol1">
          <div class="w-form contactform-wrapper">
            <form class="contactform" id="email-form" name="email-form" data-name="Email Form">
              <label class="contactform-label" for="name">Họ tên</label>
              <input class="w-input form-textfield contactus" id="name" type="text" placeholder="Nhập họ tên của bạn" name="name" data-name="Name">
              <label class="contactform-label" for="email">Địa chỉ Email</label>
              <input class="w-input form-textfield contactus" id="email" type="email" placeholder="Nhập địa chỉ Email" name="email" data-name="Email" required>
              <label class="contactform-label" for="Note">Ghi chú</label>
              <textarea class="w-input form-textfield contactus contactnote" id="Note" placeholder="Hãy để lại ghi chú của bạn ở đây" name="Note" required data-name="Note"></textarea>
              <input class="w-button button submitform contact" type="submit" value="Gửi" data-wait="Please wait...">
            </form>
            <div class="w-form-done">
              <p>Thank you! Your submission has been received!</p>
            </div>
            <div class="w-form-fail">
              <p>Oops! Something went wrong while submitting the form :(</p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6 contactcol2">
          <div class="main-cta-head contact">Thông tin liên hệ</div>
          <div class="w-row contact-rightcol-row">
            <div class="w-col w-col-3 w-col-small-3 w-col-tiny-3 contact-rightcol-lcol">
              <div class="main-cta-sub contact">Địa Chỉ
                <br>
                <br>Email
                <br>Điện Thoại
                <br>Số Fax</div>
            </div>
            <div class="w-col w-col-9 w-col-small-9 w-col-tiny-9 contact-rightcol-rcol">
              <div class="main-cta-sub contact"><a class="linksemibold" target="_blank" href="https://goo.gl/maps/mhkHH">519 Montague Expressway<br xmlns="http://www.w3.org/1999/xhtml">Milpitas, CA 95035</a>
                <br><a class="linksemibold sub" target="_blank" href="mailto:info@calicargo.com?subject=Info%20Request">info@calicargo.com</a>
                <br><a class="linksemibold sub" href="tel:+14087198000">(408) 719-8000</a>
                <br>(844) 272-0230</div>
            </div>
          </div>
          <div class="w-widget w-widget-map googlemap" data-widget-latlng="37.399859,-121.928073" data-widget-style="roadmap" data-widget-zoom="12" data-widget-tooltip="Cali Cargo - The Global Service"></div>
        </div>
      </div>
    </div>
  </div>  
<?php } ?> 