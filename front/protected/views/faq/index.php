<?php $category_types = Helper::category_types(); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a> <span class="divider">/</span> </li>
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>faq/">Faqs</a> <span class="divider">/</span> </li>
    <li class="active">All</li>
</ul>
<p class="clearfix"><a href="<?php echo HelperUrl::baseUrl(); ?>faq/add/" class="btn btn-primary pull-right">Add</a></p>
<?php $this->renderFile(Yii::app()->basePath."/views/_shared/paging.php",array('total'=>$total,'paging'=>$paging)); ?>
<table class="table table-bordered table-striped table-center category">
    <thead>
        <tr>          
            <th>Title</th>
            <th>Category</th>
            <th class="row-list-action"></th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($faqs) < 1): ?>
        <tr>
            <td colspan="3" class="align-center">No results</td>
        </tr>
        <?php endif;?>
        <?php foreach ($faqs as $v): ?>
            <tr>                
                <td><a href="<?php echo HelperUrl::baseUrl()."faq/edit/id/".$v['id']; ?>"><?php echo $v['title'] ?></a></td>    
                <td><a href="<?php echo HelperUrl::baseUrl()."category/edit/id/".$v['category_id'] ?>"><?php echo $v['category_name'] ?></a></td>                
                <td class="align-left">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            Actions
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo HelperUrl::baseUrl()."faq/edit/id/".$v['id']; ?>">Edit</a></li>
                            <li><a class="delete-row" href="<?php echo HelperUrl::baseUrl()."faq/delete/id/".$v['id']; ?>">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->renderFile(Yii::app()->basePath."/views/_shared/paging.php",array('total'=>$total,'paging'=>$paging)); ?>