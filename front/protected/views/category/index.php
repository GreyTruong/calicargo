<?php $category_types = Helper::category_types(); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a> <span class="divider">/</span> </li>
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>category/">Categories</a> <span class="divider">/</span> </li>
    <li class="active">All</li>
</ul>
<p class="clearfix">
    <span>Category type:</span>
    <select class="span2 category-type" style="margin: 0">
        <option value="all">All</option>
        <?php foreach (Helper::category_types() as $k => $v): ?>
            <option <?php if ($k == $type) echo 'selected'; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>
        <?php endforeach; ?>
    </select>
    <a href="<?php echo HelperUrl::baseUrl(); ?>category/add/" class="btn btn-primary pull-right">Add</a>
</p>
<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/paging.php", array('total' => $total, 'paging' => $paging)); ?>
<table class="table table-bordered table-striped table-center category">
    <thead>
        <tr>          
            <th class="row-img"></th>
            <th>Title</th>
            <th>Type</th>
            <th class="row-list-action"></th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($categories) < 1): ?>
            <tr>
                <td colspan="4" class="align-center">No results</td>
            </tr>
        <?php endif; ?>
        <?php foreach ($categories as $v): ?>
            <tr>
                <td><img width="50" class="img-polaroid" src="<?php echo HelperApp::get_thumbnail($v['thumbnail'], 'mini') ?>" /></td>
                <td>
                    <a href="<?php echo HelperUrl::baseUrl() . "category/edit/id/" . $v['id']; ?>"><?php echo $v['title'] ?></a>
                    <?php if ($v['featured']): ?>
                        <span class="label label-important">Feature</span>
                    <?php endif; ?>
                </td>    
                <td><?php echo $category_types[$v['type']]; ?></td>                
                <td class="align-left">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            Actions
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo HelperUrl::baseUrl() . "category/edit/id/" . $v['id']; ?>">Edit</a></li>
                            <li><a class="delete-row" href="<?php echo HelperUrl::baseUrl() . "category/delete/id/" . $v['id']; ?>">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/paging.php", array('total' => $total, 'paging' => $paging)); ?>