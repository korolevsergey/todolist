<?
include ("blocks/db.php");

if (isset($_GET['id_project'])) 
{ 
$id_project=$_GET['id_project'];
}

if (isset($_POST['task_name'])) 
{ 
$task_name=$_POST['task_name'];
}

$result00 = mysql_query("SELECT COUNT(id) FROM tasks WHERE id_project='$id_project'");
$temp = mysql_fetch_array($result00);
$pos = $temp[0];

$position=$pos+1;

$result2 = mysql_query ("INSERT INTO tasks (login,id_project,task_name,position) VALUES ('$login','$id_project','$task_name','$position')",$db);


if ($result2=='TRUE')
{
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head><body><p><font size='3'><strong></body></html>" ;
}
?>