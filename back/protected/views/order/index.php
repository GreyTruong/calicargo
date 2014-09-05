
<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>

        <li class="active">Orders</li>
    </ul>
    <div class="m-b-md">
        <h3 class="m-b-none">List Orders</h3>
    </div>

    <section class="panel panel-default">
        <header class="panel-heading">
            List Orders
        </header>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>     
                        <th></th>
                        <th  align="left">Customer</th>
                        <th>Total</th>

                        <th>Status</th>
                        <th>Date</th>
                        <th  class="row-action"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($orders) < 1): ?>
                        <tr>
                            <td colspan="4" class="align-center">No results</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($orders as $v): ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><?php echo $v['customer_id'] ?></td>
                            <td><?php echo $v['grand_price'] ?></td>
                            <td><?php echo $v['status'] ?></td>
                            <td><?php echo date('H:i d/m/Y', $v['date_added']) ?></td>

                            <td class="">
                                <a class="btn btn-small " href="<?php echo HelperUrl::baseUrl() . "order/view/id/" . $v['id']; ?>">Details</a>
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

