<table>
<tr height="35">
  <td><strong>Modules</strong></td>
</tr>
<tr height="35">
  <td>&nbsp;</td>
</tr>
<?php 
			$resultModulesPer  =   $funObj->modulesList();
			while($rowModules   =  $funObj->fetch_object($resultModulesPer))
             {			 
			?>
<tr height="35">
  <td><strong><?php echo $rowModules->module_name; ?></strong></td>
</tr>

<!--For the children-->
<?php 
			$resultModSel  =   $funObj->modulesSelectedFromId($rowModules->id);
			while($rowModSel   =  $funObj->fetch_object($resultModSel))
             {			 
			?>
<tr height="35">
  <td>&nbsp;&nbsp;-&nbsp; <?php echo $rowModSel->module_name; ?></td>
</tr>
<!--For the children-->
<?php } } ?>
</table>
