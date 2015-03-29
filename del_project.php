<?
include ("blocks/db.php");

if (isset($_GET['id'])) 
{ 
$id=$_GET['id'];
}

$result2 = mysql_query ("DELETE FROM project WHERE login = '$login' AND id='$id' ");
$result2 = mysql_query ("DELETE FROM tasks WHERE login = '$login' AND id_project='$id' ");


if ($result2=='TRUE')
{
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head><body><p><font size='3'><strong></body></html>" ;
}
?>