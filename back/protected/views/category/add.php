
<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo HelperUrl::baseUrl(); ?>category/">Category</a>
        </li>
        <li class="active">Add</li>
    </ul>
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
            Add Category
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php echo Helper::print_error($message); ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <fieldset>      
               

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Title</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Category Parent</label>
                        <div class="col-sm-10">
                            <select class="col-xs-10 col-sm-4" name="parent">
                                <option value="0">(No Parent)</option>
                                <?php foreach($root as $k=>$r):?>
                                <option <?php echo isset($_POST['parent']) && $_POST['parent'] == $r['id'] ? 'selected' : ''?> value="<?php echo $r['id']?>"><?php echo $r['title']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                    <div class="clearfix form-actions">  
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                            <a href="<?php echo HelperUrl::baseUrl(); ?>category/" type="button" class="btn btn-sm">Close</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
