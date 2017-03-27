<?php
ob_start();
?>
<script type="text/javascript" src="{BASE_URL}js/jquery.js"></script>
<script type="text/javascript" src="{BASE_URL}js/jquery.sticky-kit.js"></script>
<script type="text/javascript" src="{BASE_URL}js/sticky-kit_intialize.js"></script>
<?php $cms['module:sticky_column'] = ob_get_clean();?>