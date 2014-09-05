<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Outcome';
$this->breadcrumbs=array(
	'Outcome',
	);
	?>


<section id="content" ng-controller="AddShipOrderCtrl" ng-init="init()">
  <section class="vbox">
    <section class="scrollable padder">             
      <div class="m-b-md">        
        <h3 class="m-b-none">Edit Outcome</h3>
        <div class="row" id="row">        
            <input type="hidden" value="<?php HelperUrl::BaseUrl(); ?>" id="base-url" />
            <form id="update_outcome" class="form-horizontal outcome-form" role="form">
                <section class="panel panel-default">          
                    <header class="panel-heading font-bold">Information</header>
                    <div class="panel-body">
                    <div class="form-group">
                        <label class=" col-xs-12 title-label">OUTCOME INFORMATION</label>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-2 k-control-label">Type</label>
                        <div class="col-xs-5">
                            <input type="text" value="<?php echo $outcome['outcome_type'] ?>" class="form-control" name="type" id="number" placeholder="Oucome type">
                        </div>
                        <label class="col-xs-2 k-control-label">Value</label>
                        <div class="col-xs-2">
                            <input type="number" value="<?php echo $outcome['value'] ?>" step="any" class="form-control" name="value" id="value" placeholder="Value">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 k-control-label">Description</label>
                        <div class="col-xs-10">
                            <textarea class="form-control" rows="3" name="desc"><?php echo $outcome['description'] ?></textarea>
                        </div>                                
                    </div>
                  
                    <div class="form-group mb0">
                        <div class="col-xs-4 text-left">
                        </div>
                        <div class="col-xs-8 text-right">
                          <button type="reset" class="btn btn-info" style="min-width:80px;">Reset</button>                              
                          <button type="submit" class="btn btn-success" style="min-width:80px; margin-left:10px;">Update</button>
                        </div>
                    </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</section>
</section>
</section>                   