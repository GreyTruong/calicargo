
<ul class="breadcrumb">
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a> <span class="divider">/</span> </li>
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>log/">Logs</a> <span class="divider">/</span> </li>
    <li class="active">All</li>
</ul>
<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/paging.php", array('total' => $total, 'paging' => $paging)); ?>
<table class="table table-bordered table-striped table-center">
    <thead>
        <tr>          
            <th class="row-id">#</th>
            <th>Username</th>
            <th>Date</th>
            <th>Access</th>
            <th>Ip</th>
            <th class="row-action"></th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($logs) < 1): ?>
            <tr>
                <td colspan="6" class="align-center">No results</td>
            </tr>
        <?php endif; ?>
        <?php foreach ($logs as $v): ?>
            <tr>
                <td><?php echo $v['id']; ?></td>
                <td>
                    <a href="<?php echo HelperUrl::baseUrl() . "admin/edit/id/" . $v['admin_id']; ?>"><?php echo $v['author'] ?></a>
                    <p><span class="label label-info"><?php echo $v['role'] ?></span></p>
                </td>                
                <td><?php echo date('d-m-Y h:i a', $v['date_added']); ?></td>
                <td>
                    <p>Controller: <strong><?php echo $v['access_controller'] ?></strong></p>
                    <p>Method: <strong><?php echo $v['access_method'] ?></strong></p>
                </td>
                <td><?php echo $v['admin_ip'] ?></td>
                <td>
                    <a href="#log-<?php echo $v['id'] ?>" class="btn btn-info" data-toggle="modal">Detail</a>                    

                    <div class="modal hide fade align-left" id="log-<?php echo $v['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3>Log #<?php echo $v['id'] ?></h3>
                        </div>
                        <div class="modal-body">
                            <pre>
                                <?php print_r(unserialize($v['description'])); ?>
                            </pre>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>                            
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->renderFile(Yii::app()->basePath . "/views/_shared/paging.php", array('total' => $total, 'paging' => $paging)); ?>