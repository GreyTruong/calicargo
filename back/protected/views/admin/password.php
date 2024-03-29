
<ul class="breadcrumb">
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a> <span class="divider">/</span> </li>    
    <li class="active">Change password</li>
</ul>
<legend>Change password</legend>

<?php echo Helper::print_error($message); ?>
<?php echo Helper::print_success($message); ?>

<form class="form-horizontal" method="post">
    <div class="control-group">
        <label class="control-label">Old password</label>
        <div class="controls">
            <input type="password" name="oldpwd" value="" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">New password</label>
        <div class="controls">
            <input type="password" name="newpwd1" value="" />
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label">Confirm</label>
        <div class="controls">
            <input type="password" name="newpwd2" value="" />
        </div>
    </div>

    <div class="form-actions">        
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

