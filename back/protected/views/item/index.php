<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>

        <li class="active">List Item</li>
    </ul>



    <div class="m-b-md">
        <h3 class="m-b-none">List Item</h3>
    </div>

    <p class="clearfix"><a href="<?php echo HelperUrl::baseUrl(); ?>item/add/" class="btn btn-primary pull-right">Add Item</a></p>

    <section class="panel panel-default">
        <header class="panel-heading">
            List Item
        </header>

        <div class="table-responsive">



            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>     
                        <th></th>
                        <th>Name</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($items) < 1): ?>
                        <tr>
                            <td colspan="6" class="align-center">No results</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($items as $v): ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><?php echo $v['title'] ?></td>
                            <td><img width ="200" src="<?php echo HelperUrl::upload_url() . $v['img'] ?>"/></td>
                            <td class="">
                                <span class="">
                                    <a href="<?php echo HelperUrl::baseUrl() . "item/edit/id/" . $v['id']; ?>" class="blue btn btn-xs btn-success ">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <?php if (UserControl::getRole() == 'superadmin'): ?>
                                        <a href="<?php echo HelperUrl::baseUrl() . "item/delete/id/" . $v['id']; ?>" class="red btn btn-xs btn-danger delete-row">
                                            <i class=" ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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