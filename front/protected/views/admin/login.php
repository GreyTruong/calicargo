<div id="login-panel" class="span6 offset3">

    <?php echo Helper::print_error($message); ?>
    <form class="well" method="post" action="">
        <fieldset>
            <div>
                <label><?php echo Helper::_lang('username'); ?></label>
                <input type="text" name="title" class="input-xlarge" value="<?php echo isset($_POST['title']) ? $_POST['title'] : "" ?>">
            </div>
            <div>
                <label><?php echo Helper::_lang('password'); ?></label>
                <input type="password" name="password" class="input-xlarge">
            </div>
            <button type="submit" class="btn btn-large btn-primary">Login</button>
        </fieldset>
    </form>
</div>
<div class="clearfix"></div>