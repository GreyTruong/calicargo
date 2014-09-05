<section class="scrollable padder">
    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li><a href="<?php echo HelperUrl::baseUrl() ?>"><i class="fa fa-home"> Homepage</i></a></li>
        <li><a href="<?php echo HelperUrl::baseUrl() ?>stockin"> Stock-in</a></li>

        <li class="active">Add</li>
    </ul>



    <div class="m-b-md">
        <h3 class="m-b-none">Add Stock-in</h3>
    </div>



    <section class="panel panel-default">
        <header class="panel-heading">
            List Item
        </header>
        <div class="panel-body">
            <form enctype="multipart/form-data" class="form-horizontal" method="post">
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Item</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="item" id="input-id-1" value="<?php echo isset($_POST['item']) ? $_POST['item'] : '' ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="price" id="input-id-1" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1">Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="number" id="input-id-1" value="<?php echo isset($_POST['number']) ? $_POST['number'] : '' ?>">
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

