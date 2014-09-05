<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>
        <li><a href="<?php echo HelperUrl::baseUrl() ?>customer"> Customers</a></li>

        <li class="active">Edit</li>
    </ul>



    <div class="m-b-md">
        <h3 class="m-b-none">Edit Customer</h3>
    </div>



    <section class="panel panel-default">
        <header class="panel-heading">
            List Item
        </header>
        <div class="panel-body">
            <form enctype="multipart/form-data" class="form-horizontal" method="post">
                <div class="line line-dashed line-lg pull-in"></div>
           

                <div class="form-group">
                        <label class="col-sm-2 control-label ">Email</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : $customer['email']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Mật Khẩu</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Nhập Lại Mật Khẩu</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="re_password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Họ và Tên</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="name" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : $customer['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Số điện thoại</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="phone" value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] : $customer['phone']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Địa chỉ</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="address" value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : $customer['address']; ?>">
                        </div>
                    </div>


                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

</section>



