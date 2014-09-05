<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>
        
        <li><a href="<?php echo HelperUrl::baseUrl() ?>order/"> Order</a></li>

        <li class="active">Details</li>
    </ul>
    <div class="m-b-md">
        <h3 class="m-b-none">Order Details</h3>
    </div>
  
    <section class="panel panel-default">
        <header class="panel-heading">
            Order Details
        </header>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>   
                        <th></th>  
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Number</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($order_details) < 1): ?>
                        <tr>
                            <td colspan="6" class="align-center">No results</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($order_details as $v): ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><?php echo $v['code'] ?></td>
                            <td><?php echo $v['price'] ?></td>
                            <td><?php echo $v['number'] ?></td>
                            <td><?php echo $v['total'] ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

               
            </div>
        </footer>
    </section>
</section>
