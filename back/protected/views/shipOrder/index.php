<section id="content" ng-controller="ViewShipOrderCtrl" ng-init="init()">
  <section class="vbox">
    <section class="scrollable padder">      
      <div class="m-b-md">
      	<!--this module_title can be changed in app.config (placed in footer.php)-->
        <h3 class="m-b-none">{{module_title}}</h3>
      </div>
      <ul class="pagination" ng-show="numOfPage > 1">
        <li>
            <a ng-show="currentPage <= 0" href="#">&laquo;</a>
            <a ng-show="currentPage > 0" ng-click="currentPage=currentPage-1" href="#">&laquo;</a>
        </li>
        <li ng-class="{active:(p==currentPage+1)}" ng-repeat="p in pages"><a ng-click="" href="#">{{p}}</a></li>
        <li>
            <a ng-show="currentPage >= numOfPage - 1" href="#">&raquo;</a>
            <a ng-show="currentPage < numOfPage - 1" ng-click="currentPage=currentPage+1" href="#">&raquo;</a>
        </li>
      </ul>
      <section class="panel panel-default">
        <header class="panel-heading">
          {{module_title}}
          <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
        </header>
        <div class="table-responsive">
          <table class="table table-striped m-b-none">
            <thead>
              <tr>              	
                <th ng-repeat="c in columns">{{c}}</th>
              </tr>
              <tr  ng-repeat = "o in orders | startFrom:currentPage*pageSize | limitTo:pageSize">              
              	<td>{{o.ship_order_id}}</td>
              	<td>{{o.order_type}}</td>
              	<td>{{o.ship_type}}</td>
              	<td>{{fullname(o.sender_first_name, o.sender_middle_name, o.sender_last_name);}}</td>
              	<td>{{address(o.sender_address, o.sender_city, o.sender_state, o.sender_zipcode, o.sender_country);}}</td>
              	<td>{{dateConverter(o.date_added) | date:'yyyy-MM-dd'}}</td>
              	<td>
              		<div class="col-xs-6" style="padding:0">
              			<a class="btn btn-sm btn-info" ng-href="{{editUrl(o.ship_order_id)}}">
              				Edit
              			</a>
              		</div>
              		<div class="col-xs-6" style="padding:0">
              			<button class="btn btn-sm btn-danger" ng-click="delete_order(o.ship_order_id)">
              				Delete
              			</button>
              		</div>
              	</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </section>
  <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>