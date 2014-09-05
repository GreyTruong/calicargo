<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo HelperUrl::baseUrl(); ?>category/">Thể loại</a>
        </li>
        <li class="active">Chỉnh sửa</li>
    </ul>
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
         Chỉnh sửa thể loại
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php echo Helper::print_error($message); ?>
            <?php echo Helper::print_success($message); ?>
            <form id="form-edit-category"  enctype="multipart/form-data" method="post" class="form-horizontal">
                <div class="modal-body">
                    <fieldset>      
                        
                        <?php foreach ($languages as $l): ?>
                            <h3 class="header smaller lighter blue"><?php echo $l['title'] ?></h3>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo isset($category[$l['id']]['title']) ? $category[$l['id']]['title'] : '' ?>" name="<?php echo $l['id'] ?>[title]" class="col-xs-10 col-sm-12 category-title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo isset($category[$l['id']]['slug']) ? $category[$l['id']]['slug'] : '' ?>" name="<?php echo $l['id'] ?>[slug]" class="col-xs-10 col-sm-12 category-slug">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" href="<?php echo HelperUrl::baseUrl()?>/category">Hủy</a>
                    <button type="submit" class="btn btn-primary">Lưu Lại</button>
                </div>
            </form>
        </div>
    </div>
</div>