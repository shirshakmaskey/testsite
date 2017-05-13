<?php 
  include_once("includes/application_top.php");
  session_destroy();
  session_unset();
  $url = "index.php";
  $funObj->redirect($url);
  ?>