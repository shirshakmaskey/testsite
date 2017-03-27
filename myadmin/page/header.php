<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
				<div>
					<div class="right clearfix">
						<ul class="nav navbar-nav pull-right right-navbar-nav">
                           <li class="nav-icon-btn nav-icon-btn-danger dropdown">
                           <?php 
										$resNews = $funNewsObj->newsListActive();
										$numNews = $db->num_rows($resNews);
										?>
								
								<!-- Javascript -->
								<script>
									init.push(function () {
										$('#main-navbar-notifications').slimScroll({ height: 250 });
									});
								</script>
								<!-- / Javascript -->
                               <?php if(count($numNews)>0){ ?>  
								<div class="dropdown-menu widget-notifications no-padding" style="width: 300px">
									<div class="notifications-list" id="main-navbar-notifications">

										<?php while($rowNews =  $db->result($resNews)){
											$added_by =  $rowNews->added_by;
											if(!empty($added_by))
											{
											$row_user =  $funUserObj->userSel($added_by);
											$author_news =  $row_user->fullname;
											}else{
											$author_news =  'System';	
											}
											 ?>
										<div class="notification">
											<div class="notification-title text-success"><?php  echo @$rowNews->news_title?></div>
											<div class="notification-description"><?php echo html_entity_decode($rowNews->short_description)?></div>
											<div class="notification-ago"><?php  echo date("F d,Y",strtotime($rowNews->created_at))?> (By : <?php echo $author_news?>)</div>
											<a href="view_news-news-<?php echo encode($rowNews->id)?>"><div class="notification-icon fa fa-eye bg-success"></div></a>
										</div> <!-- / .notification -->
                                        <?php } ?>  

									</div> <!-- / .notifications-list -->
									<a href="#" class="notifications-link">MORE NEWS AND MESSAGES</a>
								</div> <!-- / .dropdown-menu -->
                                <?php }else{?>
                                <div class="dropdown-menu widget-notifications no-padding" style="width: 300px">
									
									<a href="#" class="notifications-link">No message found!!</a>
								</div> <!-- / .dropdown-menu -->
                                <?php }?>
							</li>
                           <li class="dropdown">
								<a href="#">
								    <i class="nav-icon fa fa-calculator"></i>
									<?php echo date("D F d Y"); ?>&nbsp;<i class="nav-icon fa fa-clock-o"></i> <span id="headerdatetime"></span>
								</a>
							</li>	
							<li class="dropdown">
								<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
  <?php $rowUserImage   =  $funUserObj->userListSel($_SESSION[ENCR_KEY.'pathsaleLoginId']);
		$imgHeader  =  $rowUserImage->image;							 		  
        if(file_exists("../images/user_image/".$imgHeader)  and !empty($imgHeader))
	    { echo "<img src='../images/user_image/$imgHeader' border='0'>"; } ?>
									
									
									<span><?php echo ucwords($rowUserImage->fullname);?></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="view-user-<?php echo encode($_SESSION[ENCR_KEY.'pathsaleLoginId']);?>"><i class="dropdown-icon fa fa-user "></i>&nbsp;&nbsp;Profile</a></li>
									<li><a href="<?php echo base_url('myadmin/index-setting')?>"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo base_url()?>" target="_blank"><i class="dropdown-icon fa fa-shopping-cart"></i>&nbsp;&nbsp;Visit Site</a></li>
								</ul>
							</li>
                            <li><a href="<?php echo base_url('myadmin/signout')?>"><span class="hidden-xs hidden-sm hidden-md">Logout</span> <i class="fa fa-sign-out fa-lg"></i></a></li>
						</ul> <!-- / .navbar-nav -->
					</div> <!-- / .right -->
				</div>
			</div> <!-- / #main-navbar-collapse -->