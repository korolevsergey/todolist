<?
include ("blocks/db.php");

if (isset($_GET['id'])) 
{ 
$id=$_GET['id'];
}

if (isset($_POST['task_name']) OR isset($_POST['deadline']) OR isset($_POST['done'])) 
{ 
$task_name=$_POST['task_name'];
$deadline=$_POST['deadline'];
$done=$_POST['done'];
}

$deadline= date('Y-m-d', strtotime($deadline));

$result2 = mysql_query ("UPDATE tasks SET task_name='$task_name', deadline='$deadline', done='$done' WHERE login='$login' AND id='$id'",$db);


if ($result2=='TRUE')
{
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head><body><p><font size='3'><strong></body></html>" ;
}
?>