
<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>
        <li><a href="<?php echo HelperUrl::baseUrl() ?>admin"> User</a></li>

        <li class="active">Add</li>
    </ul>
    <div class="m-b-md">
        <h3 class="m-b-none">Add User</h3>
    </div>
    <?php echo Helper::print_error($message); ?>
    <?php echo Helper::print_success($message); ?>
    <section class="panel panel-default">
        <header class="panel-heading">
            List Item
        </header>
        <div class="panel-body">
            <form enctype="multipart/form-data" action="#" data-validate="parsley" class="form-horizontal" method="post">



                <div class="form-group">
                    <label class="col-sm-2 control-label ">Username</label>
                    <div class="col-sm-8">
                        <input class="form-control" data-required="true" type="text" autocomplete="off" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label ">Email</label>
                    <div class="col-sm-8">
                        <input class="form-control" data-type="email" data-required="true" type="text" autocomplete="off" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label ">Role</label>
                    <div class="col-sm-8">
                        <select name="role">
                            <?php foreach ($roler as $k => $r): ?>
                                <option value="<?php echo $k ?>"><?php echo $r ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label ">Password</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="password" autocomplete="off" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label ">Re-enter Password</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="re_password" >
                    </div>
                </div>


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




