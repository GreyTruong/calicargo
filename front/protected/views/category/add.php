
<ul class="breadcrumb">
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a> <span class="divider">/</span> </li>
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>category/">Categories</a> <span class="divider">/</span> </li>
    <li class="active">Add</li>
</ul>
<legend>Add new category</legend>

<?php echo Helper::print_error($message); ?>

<form class="form-horizontal" method="post" enctype="multipart/form-data">    
    <fieldset>
        <div class="control-group">
            <label class="control-label">Title</label>
            <div class="controls">
                <input class="span11" type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Type</label>
            <div class="controls">
                <select name="type" class="span11">
                    <?php foreach (Helper::category_types() as $k => $v): ?>
                        <option <?php if (isset($_POST['type']) && $_POST['type'] == $k) echo 'selected'; ?> value="<?php echo $k ?>"><?php echo $v; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Image</label>
            <div class="controls">
                <input type="file" name="file"/>
                <p class="help-block">Image must larger than 300x300px and smaller than 3MB</p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Description</label>
            <div class="controls">
                <textarea class="span11" rows="10" name="description"><?php if (isset($_POST['description'])) echo $_POST['description'] ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Disabled</label>
            <div class="controls">
                <label class="radio small">
                    <input type="radio" name="disabled" value="1" <?php if (isset($_POST['disabled']) && $_POST['disabled']) echo 'checked'; ?>>
                    Yes
                </label>
                <label class="radio small">
                    <input type="radio" name="disabled" value="0" <?php if (isset($_POST['disabled']) && !$_POST['disabled']) echo 'checked'; ?> checked>
                    No
                </label>            
            </div>
        </div>

        <div class="form-actions">        
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </fieldset>
</form>

