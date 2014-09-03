

<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl()?>"><i class="fa fa-home"></i> <?php echo $_lang['homepage']?></a></li>
       
        <li class="active"><?php echo $_lang['list']?></li>
    </ul>
    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $_lang['list']?></h3>
    </div>

    <section class="panel panel-default">
        <header class="panel-heading">
            <?php echo $_lang['list']?>
        </header>

        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th class="row-id">#</th>            
                        <th>Username</th>
                        <th>Date Added</th>
                        <th>Role</th>
                        <th class="row-action"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $v): ?>
                        <tr>
                            <td><?php echo $v['id'] ?></td>
                            <td><a href="#"><?php echo $v['title'] ?></a></td>
                            <td><?php echo date("d-m-Y", $v['date_added']); ?></td>
                            <td><?php echo $v['role'] ?></td>
                            <td>
                                <a class="btn btn-small" href="#"><?php echo $_mainlang['edit']?></a>
                                <a class="btn btn-small btn-danger delete-row" href="#"><?php echo $_mainlang['delete']?></a>
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