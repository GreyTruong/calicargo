
<ul class="breadcrumb">
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a> <span class="divider">/</span> </li>
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>category/">Categories</a> <span class="divider">/</span> </li>
    <li class="active">Edit <span class="divider">/</span> </li>
    <li class="active"><?php echo $category['title'] ?></li>
</ul>
<legend>Edit category</legend>

<?php echo Helper::print_error($message); ?>
<?php echo Helper::print_success($message); ?>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="clearfix avatar">
        <img class="pull-right img-polaroid" src="<?php echo HelperApp::get_thumbnail($category['thumbnail'], 'small'); ?>" />
    </div>
    <fieldset>       

        <div class="control-group">
            <label class="control-label">Title</label>
            <div class="controls">
                <input class="span9" type="text" name="title" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : htmlspecialchars($category['title']); ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Type</label>
            <div class="controls">
                <select name="type" class="span9">
                    <?php foreach (Helper::category_types() as $k => $v): ?>
                        <option <?php if (isset($_POST['type']) && $_POST['type'] == $v) echo 'selected';else if ($category['type'] == $k) echo 'selected'; ?> value="<?php echo $k ?>"><?php echo $v; ?></option>
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
        
<!--        <div class="control-group">
            <label class="control-label">File</label>
            <div class="controls">
                <input type="file" name="test"/>
                
            </div>
        </div>-->

        <div class="control-group">
            <label class="control-label">Description</label>
            <div class="controls">
                <textarea class="span5 tinymce" rows="10" name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $category['description']; ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Feature</label>
            <div class="controls">
                <label class="radio small">
                    <input type="radio" name="featured" value="1" <?php if (isset($_POST['featured']) && $_POST['featured']) echo 'checked';else if ($category['featured']) echo 'checked' ?>>
                    Yes
                </label>
                <label class="radio small">
                    <input type="radio" name="featured" value="0" <?php if (isset($_POST['featured']) && !$_POST['featured']) echo 'checked';else if (!$category['featured']) echo 'checked'; ?>>
                    No
                </label>            
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Disabled</label>
            <div class="controls">
                <label class="radio small">
                    <input type="radio" name="disabled" value="1" <?php if (isset($_POST['disabled']) && $_POST['disabled']) echo 'checked';else if ($category['disabled']) echo 'checked'; ?>>
                    Yes
                </label>
                <label class="radio small">
                    <input type="radio" name="disabled" value="0" <?php if (isset($_POST['disabled']) && !$_POST['disabled']) echo 'checked';else if (!$category['disabled']) echo 'checked' ?>>
                    No
                </label>


            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Deleted</label>
            <div class="controls">
                <label class="radio small">
                    <input type="radio" name="deleted" value="0" <?php if (isset($_POST['deleted']) && !$_POST['deleted']) echo 'checked';else if (!$category['deleted']) echo 'checked'; ?>>
                    No
                </label>    
                <label class="radio small">
                    <input type="radio" name="deleted" value="1" <?php if (isset($_POST['deleted']) && $_POST['deleted']) echo 'checked';else if ($category['deleted']) echo 'checked'; ?>>
                    Yes
                </label>

            </div>
        </div>

        <div class="form-actions">        
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </fieldset>
</form>

