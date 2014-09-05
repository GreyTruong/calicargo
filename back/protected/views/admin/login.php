
<?php echo Helper::print_error($message); ?>
<form  method="post" action="" class="panel-body wrapper-lg">
    <div class="form-group">
        <label class="control-label"><?php echo Helper::_lang('username'); ?></label>
        <input name="title"  value="<?php echo isset($_POST['title']) ? $_POST['title'] : "" ?>" placeholder="Username" class="form-control input-lg">
    </div>
    <div class="form-group">
        <label class="control-label"><?php echo Helper::_lang('password'); ?></label>
        <input type="password" name="password" id="inputPassword" placeholder="Password" class="form-control input-lg">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Keep me logged in
        </label>
    </div>
    <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
    <button type="submit" class="btn btn-primary">Sign in</button>
    <div class="line line-dashed"></div>
   
</form>