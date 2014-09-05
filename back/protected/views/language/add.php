

<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo HelperUrl::baseUrl(); ?>">Trang Chủ</a>
        </li>
        <li>
            <a href="<?php echo HelperUrl::baseUrl(); ?>language/">Ngôn Ngữ</a>
        </li>
        <li class="active">Thêm Ngôn Ngữ</li>
    </ul>
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
            Thêm Ngôn Ngữ
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php echo Helper::print_error($message); ?>
            <form class="form-horizontal form-validate" method="post" enctype="multipart/form-data">
                <fieldset>      
               

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Ngôn Ngữ</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5 require" type="text" autocomplete="off" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
                        </div>
                    </div>
                    
                    
                    

                    <div class="clearfix form-actions">  
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-primary">Thêm</button>
                            <a href="<?php echo HelperUrl::baseUrl(); ?>language/" type="button" class="btn btn-sm">Hủy</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

