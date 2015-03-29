<?
include ("blocks/db.php");

if (isset($_POST['project_name'])) 
{ 
$project_name=$_POST['project_name'];
}

$result2 = mysql_query ("INSERT INTO project (login,project_name) VALUES ('$login','$project_name')",$db);


if ($result2=='TRUE')
{
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head><body><p><font size='3'><strong></body></html>" ;
}
?>