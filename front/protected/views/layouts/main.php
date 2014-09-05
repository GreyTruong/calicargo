<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/header.php"); ?>
<div class="container" style="padding-top:80px">   
    <div class="row">

        <?php $this->widget('Sidebar'); ?>
        <div class="span10">
            <div class="row-fluid">
                <?php echo $content; ?>
            </div>
        </div>

    </div>
</div>
<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/footer.php"); ?>
