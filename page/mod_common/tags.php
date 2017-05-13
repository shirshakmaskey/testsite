<?php
ob_start();
?>
<ul class="blog-list1">
					  <h3>Tags</h3>
						<li><a href="<?php echo base_url("rooms/super-deluxe-with-ac");?>">Rooms</a></li>
						<li><a href="<?php echo base_url("booking");?>">Reservation</a></li>
						<li><a href="<?php echo base_url("pages/about-us");?>">About Us</a></li>
						<li><a href="<?php echo base_url("pages/hotel-history");?>">History</a></li>
						<li><a href="<?php echo base_url("contact");?>">Contact Us</a></li>
						<li><a href="<?php echo base_url("pages/tour-package");?>">Tour Packages</a></li>
						<li><a href="<?php echo base_url("pages/site-seeing");?>">Site Seeing</a></li>
						<li><a href="<?php echo base_url("pages/spa");?>">Spa</a></li>
						<li><a href="<?php echo base_url("pages/hotel-features");?>">Hotel Features</a></li>
						<li><a href="<?php echo base_url("pages/tarrif");?>">Room Tarrif</a></li>
						<li><a href="<?php echo base_url("sitemap");?>">Site Map</a></li>
					</ul>
<?php $cms['module:tags'] = ob_get_clean();