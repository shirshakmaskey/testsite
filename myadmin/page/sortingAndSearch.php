<?php
$searchQu ="";$sortBy  ='';
if(isset($_POST['search_x'])) { $searchQu = $_POST['searchTxt']; }
else if(isset($_POST['searchBtn'])) { $searchQu = $_POST['searchTxt']; }
else {$searchQu=@$_POST['searchQu']; }


// sorting and reading
$sortBy  =     (@$_POST['sortBy']=="desc")?"asc":"desc";
$sortActive  = ($sortBy=="desc")?"sortActive1":"sortActive2";
$sortField  =  isset($_POST['sortField'])?$_POST['sortField']:"id";
$_SESSION['recordPerPage']  =  isset($_SESSION['recordPerPage'])?$_SESSION['recordPerPage']:10;
// sorting and reading end 
?>
<!--Sorting By field-->
<script language="javascript">
function sortingField(sortBy,sortField)
{
  document.getElementById('sortBy').value=sortBy;
  document.getElementById('sortField').value=sortField;
  document.getElementById('sortingForm').submit();
}
</script>

<form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" id="sortingForm" name="sortingForm" method="post">
<input type="hidden" name="sortField" id="sortField" />
<input type="hidden" name="sortBy" id="sortBy" />
<?php $_POST['searchTxt'] = !empty($_POST['searchTxt']) ?  $_POST['searchTxt'] : $searchQu;
?>
<input type="hidden" name="searchQu" id="searchQu" value="<?php echo $_POST['searchTxt']; ?>" />
<input type="hidden" name="SortButton" value="1" />
</form>
<!--Sorting By field end-->