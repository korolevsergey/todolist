<?
include ("blocks/db.php");

if (isset($_GET['id'])) 
{ 
$id=$_GET['id'];
}

if (isset($_POST['done'])) 
{ 
$done=$_POST['done'];
}

$result2 = mysql_query ("UPDATE tasks SET done='$done' WHERE login='$login' AND id='$id'",$db);


if ($result2=='TRUE')
{
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head><body><p><font size='3'><strong></body></html>" ;
}
?>