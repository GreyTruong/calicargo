<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Outcome';
$this->breadcrumbs=array(
	'Outcome',
	);
	?>


    <div class="grid-row">
        <div class="content-inner">
            <div class="page-wrapper clearfix">      
                <div class="page-container notification-box" id="success-notification"><p class="bg-success">INFORMATION HAS BEEN UPDATED</p></div>                          
                <div class="page-container" id="shipping-form-main-panel">
                    <div class="page-container">
                        <p class="mb20"><h5>OUTCOME</h5></p>
                        <input type="hidden" value="<?php HelperUrl::BaseUrl(); ?>" id="base-url" />
                        <form id="update_outcome" class="form-horizontal outcome-form" role="form">
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
                        </form>
                        <div class="divider40"></div>                    
                    </div>
                </div> 
                
            </div>        
        </div>
    </div>

