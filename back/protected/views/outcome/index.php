<section id="content" ng-controller="ViewShipOrderCtrl" ng-init="init()">
  <section class="vbox">
    <section class="scrollable padder">      
      	<div class="m-b-md">
      		<!--this module_title can be changed in app.config (placed in footer.php)-->
        	<h3 class="m-b-none">{{module_title}}</h3>
      	</div>
		<section class="panel panel-default k-custom-panel">
			<div class="table-responsive">
			<input type = "hidden" value = "-1" id="tobe-deleted" />	
			    <table class="table table-striped b-t b-light">
			        <thead>
			            <tr>
			                <th class="row-id">#</th>            
			                <th>Outcome Type</th>
			                <th>Value</th>
			                <th>Description</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>

			            <?php foreach ($outcomes as $v): ?>
			                <tr class="k-order-row" id="row<?php echo $v['outcome_id'] ?>">
			                    <td><?php echo $v['outcome_id'] ?></td>
			                    <td><a href="<?php echo HelperUrl::BaseUrl() ?>outcome-update/<?php echo $v['outcome_id'] ?>"><?php echo $v['outcome_type'] ?></a></td>
			                    <td><a href="<?php echo HelperUrl::BaseUrl() ?>outcome-update/<?php echo $v['outcome_id'] ?>"><?php echo $v['value'] ?></a></td>
			                    <td><a href="<?php echo HelperUrl::BaseUrl() ?>outcome-update/<?php echo $v['outcome_id'] ?>"><?php echo $v['description'] ?></a></td>
			                    <td>
			                    	<a class="btn btn-small" href="<?php echo HelperUrl::BaseUrl() ?>outcome-update/<?php echo $v['outcome_id'] ?>"><?php echo "Edit"?></a>
			                        <a class="delete-row btn btn-small btn-danger " id="<?php echo $v['outcome_id'] ?>" href="#"><?php echo "Delete"?></a>
			                    </td>	                    
			                </tr>
			                
			            <?php endforeach; ?>
			        </tbody>
			        
			    </table>	    
			</div>
		</section><!--Order delete confirm dialog-->
		</section>
	</section>
</section>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Are you sure?</h4>
      </div>
      <div class="modal-body">
        <p>This will delete the outcome record entirely and cannot be reversed. Are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="delete_out_record" type="button" class="btn btn-primary">Yes, I want to delete everything</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Report customization dialog-->
<div class="modal fade" id="export-modal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Customize your report</h4>
      </div>
      <div class="modal-body">
    <form id="download_report_form" action="<?php echo HelperUrl::BaseUrl() .'outcome/report/' ?>" method="POST">  	
        <span class='k-custom-label'>Range (from id to id)</span>
        <div class="form-group">
        	<div class="col-xs-6 k-no-left-pad">
	        	<label class="k-sub-label col-xs-4">From: </label> 
	        	<div class="col-xs-6 k-no-left-pad">
	        	<select id="from" name="from" class="form-control">
				  <?php foreach ($outcomes as $v): ?>
				  	<option value="<?php echo $v['outcome_id']?>"><?php echo $v['outcome_id']?></option>
				  <?php endforeach; ?>
				</select>
				</div>
			</div>
			<div class="col-xs-6 k-no-left-pad">
			<label class="k-sub-label col-xs-4">To: </label>
				<div class="col-xs-6 k-no-left-pad">
	        	<select id="to" name="to" class="form-control col-xs-8">
				  <?php foreach ($outcomes as $v): ?>
				  	<option value="<?php echo $v['outcome_id']?>"><?php echo $v['outcome_id']?></option>
				  <?php endforeach; ?>
				</select>
				</div>
			</div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="download_outcome_report" class="btn btn-primary">Download Report</button>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->