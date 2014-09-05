<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>

        <li class="active">Categories</li>
    </ul>



    <div class="m-b-md">
        <h3 class="m-b-none">List Categories</h3>
    </div>

    <p class="clearfix"><a href="<?php echo HelperUrl::baseUrl(); ?>category/add/" class="btn btn-primary pull-right">Add Category</a></p>

    <section class="panel panel-default">
        <header class="panel-heading">
            List Categories
        </header>

        <div class="table-responsive">
            <div class="col-sm-6">
                <div id="nestable" class="dd">
                    <ol class="dd-list dd-0">

                        <?php foreach ($categories[0] as $v): ?>
                            <li data-id="<?php echo $v['id'] ?>" data-parent="0" class="dd-item dd-parent">

                                <div class="dd-handle">
                                    <span class="category-title"><?php echo $v['title'] ?></span>
                                    <div class="pull-right action-buttons">
                                        <a  href="<?php echo HelperUrl::baseUrl() ?>category/edit/id/<?php echo $v['id'] ?>" class="blue edit-category">
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>

                                        <a href="<?php echo HelperUrl::baseUrl() ?>category/delete/id/<?php echo $v['id'] ?>" class="red category-delete">
                                            <i class=" ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php if (isset($categories[$v['id']])): ?>
                                    <ol class="dd-list dd-<?php echo $v['id'] ?>">
                                        <?php foreach ($categories[$v['id']] as $c): ?>
                                            <li class="dd-item dd-child" data-parent="<?php echo $v['id'] ?>" data-id="<?php echo $c['id'] ?>">
                                                <div class="dd-handle">
                                                    <span class="category-title"><?php echo $c['title'] ?></span>
                                                    <div class="pull-right action-buttons">
                                                        <a href="<?php echo HelperUrl::baseUrl() ?>category/edit/id/<?php echo $c['id'] ?>" class="blue edit-category">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a href="<?php echo HelperUrl::baseUrl() ?>category/delete/id/<?php echo $c['id'] ?>"  class="red category-delete">
                                                            <i class=" ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ol>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <p class="clearfix"><a id="save-menu" href="#" class="btn btn-sm btn-primary pull-right">Save Change</a></p>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-4 text-right text-center-xs">                
                    <?php $this->renderFile(Yii::app()->basePath . "/views/_shared/paging.php", array('total' => $total, 'paging' => $paging)); ?>
                </div>
            </div>
        </footer>
    </section>
</section>

<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Thêm Thể Loại</h4>
            </div>
            <form id="form-add-category" action="<?php echo HelperUrl::baseUrl() ?>category/add" enctype="multipart/form-data" method="post" class="form-horizontal">
                <div class="modal-body">
                    <fieldset>      
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right">Thể loại cha</label>
                            <div class="col-sm-10">
                                <select name="parent">
                                    <option value="0">-- Không --</option>
                                    <?php foreach ($categories[0] as $c): ?>
                                        <option value="<?php echo $c['id'] ?>"><?php echo $c['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php foreach ($languages as $l): ?>
                            <div class="lang-field">
                                <h3 class="header smaller lighter blue"><?php echo $l['title'] ?></h3>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right">Tên thể loại</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="" name="<?php echo $l['id'] ?>[title]" class="col-xs-10 col-sm-12 category-add-title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right">Slug</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="" name="<?php echo $l['id'] ?>[slug]" class="col-xs-10 col-sm-12 category-add-slug">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu Lại</button>
                </div>
            </form>
        </div>
    </div>
</div>