<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/header.php"); ?>
<?php $this->widget('Sidebar'); ?>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">          
         
              <?php echo $content?>
            
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/footer.php"); ?>
