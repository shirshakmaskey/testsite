<?php
ob_start(); 
include(FCPATH."page/mod_contents/contact_form.php");
echo $cms['module:contact_form'];
$cms['module:enquiry'] = ob_get_clean();