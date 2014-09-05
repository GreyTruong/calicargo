<div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo HelperUrl::baseUrl(); ?>">Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo HelperUrl::baseUrl(); ?>slider/">Sliders</a>
        </li>
        <li class="active">Chỉnh sửa</li>
    </ul>
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
         Chỉnh sửa Sliders
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php echo Helper::print_error($message); ?>
             <?php echo Helper::print_success($message); ?>

            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                <fieldset>      

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Link</label>
                        <div class="col-sm-10">
                            <input class="col-xs-10 col-sm-5" type="text" name="link" value="<?php echo (isset($_POST['link'])) ? $_POST['link'] : $slider['link']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Hình ảnh</label>
                        <div class="col-sm-10">
                               <img class="img-polaroid" width="400px" src="<?php echo HelperUrl::upload_url().$slider['img'] ?>" />
              
                            <input type="file" name="file"/>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Vị trí</label>
                        <div class="col-sm-10">
                            <select name="position">
                                <?php foreach($sliders as $s):?>
                                <option class="col-xs-10 col-sm-1" <?php echo $s['position'] == $slider['position'] ? 'selected' : ''?> value="<?php echo $s['position']?>"><?php echo $s['position']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group hide">
                        <label class="col-sm-2 control-label no-padding-right">Description</label>
                        <div class="col-sm-10">
                            <textarea class="col-xs-10 col-sm-5" rows="10" name="description"><?php echo (isset($_POST['description'])) ? $_POST['description'] : $slider['description']; ?></textarea>
                        </div>
                    </div>



                    <div class="clearfix form-actions">  
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-primary">Đồng ý</button>
                            <a href="<?php echo HelperUrl::baseUrl(); ?>slider/" type="button" class="btn btn-sm">Hủy</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>



