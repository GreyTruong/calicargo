<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>

        <li class="active">List Item</li>
    </ul>



    <div class="m-b-md">
        <h3 class="m-b-none">List Item</h3>
    </div>



    <section class="panel panel-default">
        <header class="panel-heading">
            List Item
        </header>
        <div class="panel-body">
            <form enctype="multipart/form-data" class="form-horizontal" method="post">

                <header class="panel-heading bg-light text-right">
                    <ul class="nav nav-tabs nav-justified">

                        <?php foreach ($languages as $k => $l): ?>
                            <li class="<?php echo $k == 0 ? 'active' : '' ?>">
                                <a href="#lang-<?php echo $l['id'] ?>" data-toggle="tab">
                                    <?php echo $l['title'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>


                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">

                        <?php foreach ($languages as $k => $l): ?>
                            <div class="tab-pane fade in <?php echo $k == 0 ? 'active' : '' ?>" id="lang-<?php echo $l['id'] ?>">


                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-id-1">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo isset($items_lang[$l['id']]['title']) ? $items_lang[$l['id']]['title'] : '' ?>" name="<?php echo $l['id'] ?>[title]" id="input-id-1" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-id-1">Slug</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo isset($items_lang[$l['id']]['title']) ? $items_lang[$l['id']]['slug'] : '' ?>" name="<?php echo $l['id'] ?>[slug]" id="input-id-1" value="">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Code</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="code" id="input-id-1" value="<?php echo isset($_POST['code']) ? $_POST['code'] : $item['code'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Category</label>
                    <div class="col-sm-8">
                       <select class="chosen"  name="categories[]" multiple="true" class="chosen-select" style="width:500px;">
                                            <?php foreach ($categories[0] as $k => $c): ?>
                                                <option <?php echo in_array($c['id'], $category_args) ? 'selected' : '' ?> value="<?php echo $c['id'] ?>"><?php echo $c['title'] ?></option>
                                                <?php if (isset($categories[$c['id']])): ?>
                                                    <?php foreach ($categories[$c['id']] as $ke => $ca): ?>
                                                        <option <?php echo in_array($ca['id'], $category_args) ? 'selected' : '' ?> value="<?php echo $ca['id'] ?>"> -- <?php echo $ca['title'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        </select> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Image</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="file" id="input-id-1" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : $item['price'] ?>" name="price" id="input-id-1" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo isset($_POST['number']) ? $_POST['number'] : $item['number'] ?>" name="number" id="input-id-1" value="<?php echo isset($_POST['number']) ? $_POST['number'] : '' ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Disabled</label>
                    <div class="col-sm-8">
                        <label class="switch">
                            <input name="disabled" <?php echo $item['disabled'] == 1 ? 'checked' : '' ?> type="checkbox">
                            <span></span>
                        </label>
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
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



