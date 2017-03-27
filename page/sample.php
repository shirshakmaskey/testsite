<?php
ob_start();
?>
This is the Sample Page. Please do not include it.
<?php
$cms['module:content'] = ob_get_clean();
?>