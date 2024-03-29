<ul class="breadcrumb">
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>">Home</a> <span class="divider">/</span> </li>
    <li><a href="<?php echo HelperUrl::baseUrl(); ?>admin/">Administrators</a> <span class="divider">/</span> </li>
    <li class="active">All</li>
</ul>

<table class="table table-bordered table-striped table-center">
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
                    <a class="btn btn-small" href="#">Edit</a>
                    <a class="btn btn-small btn-danger delete-row" href="#">Delete</a>
                </td>                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>