<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>

        <li class="active">List Stock-in</li>
    </ul>
    <div class="m-b-md">
        <h3 class="m-b-none">List Stock-in</h3>
    </div>
    <p class="clearfix"><a href="<?php echo HelperUrl::baseUrl(); ?>stockin/add/" class="btn btn-primary pull-right">Add Stock-in</a></p>
    <section class="panel panel-default">
        <header class="panel-heading">
            List Item
        </header>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>     
                        <th></th>
                        <th>Item</th>
                        <th>Item Price</th>
                        <th>Number</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($stockins) < 1): ?>
                        <tr>
                            <td colspan="6" class="align-center">No results</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($stockins as $v): ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><?php echo $v['item_id'] ?></td>
                            <td><?php echo $v['item_price'] ?></td>
                            <td><?php echo $v['number'] ?></td>
                            <td><?php echo $v['total_price'] ?></td>
                            <td><?php echo date('H:i d/m/Y',$v['date_added'])?></td>
                            <td class="">
                                <span class="">
                                    <a href="<?php echo HelperUrl::baseUrl() . "stockin/edit/id/" . $v['id']; ?>" class="blue btn btn-xs btn-success ">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>
                                    <?php if (UserControl::getRole() == 'superadmin'): ?>
                                        <a href="<?php echo HelperUrl::baseUrl() . "stockin/delete/id/" . $v['id']; ?>" class="red btn btn-xs btn-danger delete-row">
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