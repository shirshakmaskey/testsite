<div class="page-header">
	<h1><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Dashboard</h1>
</div>
<div class="panel">
	<div class="panel-body">
		<p align="justify">Welcome to the Admin Panal of the <strong><?php echo COMPANY_SITE_NAME; ?></strong>.It Helps you to maintain your system.</p>
	</div>
</div>



<div class="row">
	<div class="col-sm-12">
		<div class="panel">
			<div class="panel-body">
				<div id="accordion-example" class="panel-group panel-group-success">
						<div class="panel">
						<div class="panel-heading"> <a href="#collapseOne" data-parent="#accordion-example" data-toggle="collapse" class="accordion-toggle"> Logged in Users </a> </div>
						<!-- / .panel-heading -->
						<div class="panel-collapse collapse in" id="collapseOne" style="height: auto;">
							<div class="panel-body">
								<div class="table-primary">
									<?php $rowHomeUserInfo  =  $funUserObj->user_info_home($_SESSION[ENCR_KEY.'pathsaleLoginId']);?>
									<table cellpadding="5" cellspacing="1" border="0" width="100%"  class="table table-bordered">
										<thead>
											<tr>
												<th>Fullname</th>
												<th>Username</th>
												<th>Level</th>
												<th>Image</th>
												<th>Last Logon</th>
												<th>No.of Login</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo ucwords($rowHomeUserInfo->fullname);?></td>
												<td><?php echo $rowHomeUserInfo->username; ?></td>
												<td><?php echo $rowHomeUserInfo->designation; ?></td>
												<td><?php $img =  $rowHomeUserInfo->image; 
		 if(file_exists("../images/user_image/".$img)  and !empty($img))
		 {
		$userImage  = "<img src='../applications/phpthumb/phpthumb.php?src=../../images/user_image/$img&aoe=1&h=60&w=60'  border='0' >";	 
		 ?>
													<a href="../images/user_image/<?php echo $img; ?>" rel="lytebox[user_image]" title="<?php echo @$rows["bannername"]; ?>"><?php echo $userImage; ?></a>
													<?php
		 }
		 ?></td>
												<td><?php echo $rowHomeUserInfo->date_of_last_logon; ?></td>
												<td><?php echo $rowHomeUserInfo->number_of_logon; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- / .panel-body --> 
							</div>
							<!-- / .collapse --> 
						</div>
					  </div>	
						<div class="panel">
							<div class="panel-heading"> <a href="#collapseTwo" data-parent="#accordion-example" data-toggle="collapse" class="accordion-toggle collapsed"> Logs </a> </div>
							<!-- / .panel-heading -->
							<div class="panel-collapse collapse" id="collapseTwo">
								<div class="panel-body"> 
								<script>
						init.push(function () {
							$('#jq-datatables-example').dataTable();
							$('#jq-datatables-example_wrapper .table-caption').text('All data logs');
							$('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
						});
					</script>
								<div class="table-primary">
								
							</div>
								 </div>
								<!-- / .panel-body --> 
							</div>
							<!-- / .collapse --> 
						</div>
				</div><!-- / accordion-example --> 
			</div><!-- / .panel-group --> 
					
		 </div><!-- / .panel --> 
	</div><!-- / .col-sm-12 --> 
</div><!-- / .row --> 

<hr class="no-grid-gutter-h grid-gutter-margin-b no-margin-t">

<div class="row">

			<div class="col-md-12">
				<!-- Javascript -->
				<script>
					init.push(function () {
						$('.widget-tasks .panel-body').pixelTasks().sortable({
							axis: "y",
							handle: ".task-sort-icon",
							stop: function( event, ui ) {
								// IE doesn't register the blur when sorting
								// so trigger focusout handlers to remove .ui-state-focus
								ui.item.children( ".task-sort-icon" ).triggerHandler( "focusout" );
							}
						});
						$('#clear-completed-tasks').click(function () {
							$('.widget-tasks .panel-body').pixelTasks('clearCompletedTasks');
						});
					});
				</script>
				<!-- / Javascript -->

				<div class="panel widget-tasks panel-dark-gray">
					<div class="panel-heading">
						<span class="panel-title"><i class="panel-title-icon fa fa-tasks"></i>Recent tasks</span>
						<div class="panel-heading-controls">
							<button id="clear-completed-tasks" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-eraser text-success"></i> Clear completed tasks</button>
						</div>
					</div> <!-- / .panel-heading -->
					<!-- Without vertical padding -->
					<div class="panel-body no-padding-vr ui-sortable">

						<div class="task">
							<span class="label label-warning pull-right">High</span>
							<div class="fa fa-arrows-v task-sort-icon"></div>
							<div class="action-checkbox">
								<label class="px-single"><input type="checkbox" class="px" value="" name=""><span class="lbl"></span></label>
							</div>
							<a class="task-title" href="#">A very important task<span>1 hour left</span></a>
						</div> <!-- / .task -->

						 <!-- / .task -->

						 <!-- / .task -->

						<div class="task">
							<div class="fa fa-arrows-v task-sort-icon"></div>
							<div class="action-checkbox">
								<label class="px-single"><input type="checkbox" class="px" value="" name=""><span class="lbl"></span></label>
							</div>
							<a class="task-title" href="#">A regular task</a>
						</div> <!-- / .task -->

						<div class="task">
							<div class="fa fa-arrows-v task-sort-icon"></div>
							<div class="action-checkbox">
								<label class="px-single"><input type="checkbox" class="px" value="" name=""><span class="lbl"></span></label>
							</div>
							<a class="task-title" href="#">A regular task</a>
						</div> <!-- / .task -->

						<div class="task">
							<span class="label pull-right">Low</span>
							<div class="fa fa-arrows-v task-sort-icon"></div>
							<div class="action-checkbox">
								<label class="px-single"><input type="checkbox" class="px" value="" name=""><span class="lbl"></span></label>
							</div>
							<a class="task-title" href="#">An unimportant task</a>
						</div> <!-- / .task -->

						<div class="task completed">
							<span class="label pull-right">Low</span>
							<div class="fa fa-arrows-v task-sort-icon"></div>
							<div class="action-checkbox">
								<label class="px-single"><input type="checkbox" class="px" value="" name=""><span class="lbl"></span></label>
							</div>
							<a class="task-title" href="#">An unimportant task</a>
						</div> <!-- / .task -->

						<div class="task completed">
							<div class="fa fa-arrows-v task-sort-icon"></div>
							<div class="action-checkbox">
								<label class="px-single"><input type="checkbox" class="px" value="" name=""><span class="lbl"></span></label>
							</div>
							<a class="task-title" href="#">A regular task</a>
						</div> <!-- / .task -->

						<div class="task completed">
							<span class="label pull-right">Low</span>
							<div class="fa fa-arrows-v task-sort-icon"></div>
							<div class="action-checkbox">
								<label class="px-single"><input type="checkbox" class="px" value="" name=""><span class="lbl"></span></label>
							</div>
							<a class="task-title" href="#">An unimportant task</a>
						</div> <!-- / .task -->
					</div> <!-- / .panel-body -->
				</div> <!-- / .panel -->
			</div>
<!-- /13. $RECENT_TASKS -->

		</div>
