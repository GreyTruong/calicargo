

<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo HelperUrl::baseUrl(); ?>">Trang Chủ</a>
        </li>
        <li>
            <a href="<?php echo HelperUrl::baseUrl(); ?>user/">Người Dùng</a>
        </li>
        <li class="active">Thêm Người Dùng</li>
    </ul>
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
            Thêm Người Dùng
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php echo Helper::print_error($message); ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <fieldset>      
               

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Email</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="text" autocomplete="off" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="password" name="password" autocomplete="off">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Nhập lại mật khẩu</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="password" name="re_password" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Họ và Tên</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="text" name="name" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : ''; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="text" name="phone" value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] :''; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="text" name="address" value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : ''; ?>">
                        </div>
                    </div>
                    
                    

                    <div class="clearfix form-actions">  
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-primary">Thêm</button>
                            <a href="<?php echo HelperUrl::baseUrl(); ?>user/" type="button" class="btn btn-sm">Hủy</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

