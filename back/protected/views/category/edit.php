<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>
        <li><a href="<?php echo HelperUrl::baseUrl() ?>Category"> Category</a></li>

        <li class="active">Edit</li>
    </ul>
    <div class="m-b-md">
        <h3 class="m-b-none">Edit Category</h3>
    </div>
    <?php echo Helper::print_error($message); ?>
    <?php echo Helper::print_success($message); ?>
    <section class="panel panel-default">
        <header class="panel-heading">
            List Item
        </header>
        <div class="panel-body">
            <form enctype="multipart/form-data" action="#"  class="form-horizontal" method="post">

                <?php foreach ($languages as $l): ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Language</label>
                        <div class="col-sm-8">
                            <p class="form-control-static"><?php echo $l['title'] ?></p>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Title</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" value="<?php echo isset($_POST[$l['id']]) ? $_POST[$l['id']]['title'] : isset($category[$l['id']]['title']) ? $category[$l['id']]['title'] : '' ?>" name="<?php echo $l['id'] ?>[title]" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label ">Slug</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" value="<?php echo isset($_POST[$l['id']]) ? $_POST[$l['id']]['slug'] : isset($category[$l['id']]['slug']) ? $category[$l['id']]['slug'] : '' ?>" name="<?php echo $l['id'] ?>[slug]" >
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                <?php endforeach; ?>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

</section>



