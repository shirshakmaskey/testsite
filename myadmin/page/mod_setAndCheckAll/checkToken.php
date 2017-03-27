<?Php
if(!isset($_SESSION['mytoken']) || !isset($_POST['mytoken']) ||  ($_SESSION['mytoken']!=$_POST['mytoken']))
{
$url  = "../wrongPlace.php";
echo "<script>window.location.href='$url'</script>";	
exit;
}
?>