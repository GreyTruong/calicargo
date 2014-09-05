<section id="content" ng-controller="ShipReportCtrl" ng-init="init()">
  <section class="vbox">
    <section class="scrollable padder">      
      <div class="m-b-md">
      	<!--this module_title can be changed in app.config (placed in footer.php)-->
        <h3 class="m-b-none">Report</h3>
      </div>      
      	<div class="row" id="row"> 
      		<form id="download_report_form" role="form" class="form-horizontal" method="POST" 
                action="<?php echo HelperUrl::BaseUrl() .'shipOrder/report_order/' ?>" >  	
      		<section class="panel panel-default">
      		<header class="panel-heading font-bold">Report Options</header>
              <div class="panel-body">
      			<div class="form-group">
      			<span class='k-custom-label col-xs-2'>Shipping type</span>
      			<div class="col-xs-4">		        	
		        	<div class="col-xs-6 text-left">
                      <label class="col-xs-6 k-nopad-left">
                        <input type="radio" name="ship_type" id="ship_type" value="D2D" checked>
                        D2D
                      </label>                                      
                      <label class="col-xs-6 k-nopad-left">
                        <input type="radio" name="ship_type" id="ship_type" value="A2A">
                        A2A
                      </label>                                      
                    </div>              
					</div><div class="col-xs-6"></div>			
		        </div>
        		<div class="form-group">
        		<span class='k-custom-label col-xs-2'>Order range (from id to id)</span>	        	
		        	<div class="col-xs-2">
			        	<select class="form-control" name="from_ship_id" ng-options="f for f in froms track by f"
                    ng-model="from" ng-change="changeToId()"></select>
					   </div>
					<div class="col-xs-2">
			        	<select class="form-control" name="to_ship_id" ng-options="t for t in tos track by t" 
                ng-model="to" ng-change="changeToId()"></select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-2">
						<a href="#" class="btn btn-md btn-info" ng-click="downloadReport($event)">Export</a>
					</div>
				</div>
				</div>
				</section>				
			</form>
        </div>      
    </section>
  </section>
</section>