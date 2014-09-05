<section id="content" >
	<section class="vbox">
		<section class="scrollable padder">      
			<div class="m-b-md">
				<!--this module_title can be changed in app.config (placed in footer.php)-->
				<h3 class="m-b-none">Report History</h3>
			</div>
			<section class="panel panel-default k-custom-panel">
				<div class="table-responsive">
					<table class="table table-striped b-t b-light">
						<thead>
							<tr>
								<th class="row-id">#</th>            
								<th>Min ID</th>
								<th>Max ID</th>
								<th>Report Type</th>
								<th>Report Language</th>
								<th>Reported Date</th>	                
							</tr>
						</thead>
						<tbody>

							<?php foreach ($records as $v): ?>
								<tr class="k-order-row">
									<td><?php echo $v['ship_transaction_id'] ?></td>
									<td><?php echo $v['min_order_id'] ?></td>
									<td><?php echo $v['max_order_id'] ?></td>
									<td><?php echo $v['report_type'] ?></td>
									<td><?php echo $v['report_lang']?></td>	                    
									<td><?php echo $v['date_added'] ?></td>	                    
								</tr>

							<?php endforeach; ?>
						</tbody>

					</table>	    
				</div>
			</section>
		</section>
	</section>
</section>