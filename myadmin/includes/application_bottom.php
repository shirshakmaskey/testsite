<?php
$funObj->disconnect_db();
?>
<?php
if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){ echo "<script>window.location.href='http://google.com'</script>";  }
defined("MYINDEX") or die("Restricted Access for viewing this file");
?>