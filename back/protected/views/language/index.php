
<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo HelperUrl::baseUrl(); ?>">Trang Chủ</a>
        </li>
        <li>
            <a href="<?php echo HelperUrl::baseUrl(); ?>user">Ngôn Ngữ</a>
        </li>
        <li class="active">Danh sách ngôn ngữ</li>
    </ul>
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Danh sách ngôn ngữ
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php //echo Helper::print_success($message); ?>
            <p class="clearfix"><a href="<?php echo HelperUrl::baseUrl(); ?>language/add" class="btn btn-sm btn-primary pull-right">Thêm ngôn ngữ</a></p>

            <?php $this->renderFile(Yii::app()->basePath . "/views/_shared/paging.php", array('total' => $total, 'paging' => $paging)); ?>
            <table id="users" class="table table-bordered table-striped table-center category">
                <thead>
                    <tr>          
                        <th>Ngôn ngữ</th>
                        <th width="10%">Mặc định</th>
                        <th width="20%">Sử dụng</th>



                        <th width="20%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($langs) < 1): ?>
                        <tr>
                            <td colspan="4" class="align-center">Không tìm thấy ngôn ngữ.</td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($langs as $v): ?>
                        <tr>
                            <td>
                                <?php echo $v['title'] ?>
                            </td>    
                            <td>
                                <div class="radio language-default">
                                    <label>
                                        <input class="ace <?php echo $default == $v['id'] ? 'checked' : '' ?>" data-id="<?php echo $v['id']?>" <?php echo $default == $v['id'] ? 'checked' : '' ?> type="radio" name="default">
                                        <span class="lbl"> </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <label>
                                    <input value="ban" data-url="<?php echo HelperUrl::baseUrl() . "language/ban/id/" . $v['id']; ?>" type="checkbox" <?php echo $v['disabled'] == 0 ? 'checked' : '' ?> class="ace ace-switch ace-switch-6 ban" name="switch-field-1">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class="">
                                <a class="btn btn-small " href="<?php echo HelperUrl::baseUrl() . "language/edit/id/" . $v['id']; ?>">Thay đổi</a>
                                <a class="btn btn-small btn-danger delete-row" href="<?php echo HelperUrl::baseUrl() . "language/delete/id/" . $v['id']; ?>">Xóa</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php $this->renderFile(Yii::app()->basePath . "/views/_shared/paging.php", array('total' => $total, 'paging' => $paging)); ?>
        </div>
    </div>
</div>