<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>

        <li class="active">List Customer</li>
    </ul>
    <div class="m-b-md">
        <h3 class="m-b-none">List Customer</h3>
    </div>
    <section class="panel panel-default">
        <header class="panel-heading">
            List Customer
        </header>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>          
                        <th>Email</th>
                        <th width="20%">Active</th>

                        <th width="20%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($customers) < 1): ?>
                        <tr>
                            <td colspan="4" class="align-center">No results.</td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($customers as $v): ?>
                        <tr>
                            <td>
                                <?php echo $v['email'] ?>
                            </td>    
                            <td>
                                <label>
                                    <input value="ban" data-id="<?php echo $v['id']?>" data-url="<?php echo HelperUrl::baseUrl() . "customer/ban/id/" . $v['id']; ?>" type="checkbox" <?php echo $v['disabled']== 0 ? 'checked' : ''?> class="ace ace-switch ace-switch-6 ban" name="switch-field-1">
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td class="">
                                <a class="btn btn-small " href="<?php echo HelperUrl::baseUrl() . "customer/edit/id/" . $v['id']; ?>">Edit</a>
                                <a class="btn btn-small btn-danger delete-row" href="<?php echo HelperUrl::baseUrl() . "customer/delete/id/" . $v['id']; ?>">Delete</a>
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

