<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>datatable basic</title>
<script language="javascript" src="../ui/js/jquery-1.7.2.min.js"></script>
<script language="javascript" src="../ui/js/jquery-ui-1.8.22.custom.min.js"></script>
<script language="javascript" src="jquery.tablesorter.js"></script>
<link rel="stylesheet" href="datatable.css" />
<script language="javascript" src="jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {
			$('#example').dataTable();
			});
		</script>
</head>

<body>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
	<thead>
		<tr>
			<th width="30%">Browser</th>
			<th width="20%">Rendering engine</th>
			<th width="18%">Platform(s)</th>
			<th width="20%">Engine version</th>
			<th width="12%">CSS grade</th>
		</tr>
	</thead>
    <tbody>
		<tr>
			<td>Naresh</th>
			<td>20</th>
			<td>Suwal</th>
			<td>Dev</th>
			<td>Libali</th>
		</tr>
        <tr>
			<td>ganesh</th>
			<td>28</th>
			<td>Suwal</th>
			<td>Dev</th>
			<td>data</th>
		</tr>
        <tr>
			<td>manali</th>
			<td>19</th>
			<td>Suwal</th>
			<td>Dev</th>
			<td>bkt</th>
		</tr>
        <tr>
			<td>padam</th>
			<td>24</th>
			<td>Suwal</th>
			<td>Dev</th>
			<td>ktm</th>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>Browser</th>
			<th>Rendering engine</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</tfoot>
</table>


</body>
</html>