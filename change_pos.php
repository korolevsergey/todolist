<?
include ("blocks/db.php");

if (isset($_GET['id'])) 
{ 
$id=$_GET['id'];
}

if (isset($_GET['pos'])) 
{ 
$pos=$_GET['pos'];
}

if (isset($_GET['change'])) 
{ 
$change=$_GET['change'];
}

if (isset($_GET['id_project'])) 
{ 
$id_project=$_GET['id_project'];
}

$result00 = mysql_query("SELECT COUNT(id) FROM tasks WHERE id_project='$id_project'");
$temp = mysql_fetch_array($result00);
$num = $temp[0];

if ($change=='up' AND $pos!=$num)
{
$position=$pos+1;
$result4 = mysql_query ("SELECT * FROM tasks WHERE login='$login' AND id_project='$id_project' AND position='$position'",$db);
$myrow4 = mysql_fetch_array($result4);
$new_position=$myrow4[position]-1;
$result5 = mysql_query ("UPDATE tasks SET position='$new_position' WHERE login='$login' AND id='$myrow4[id]'",$db);
$result6 = mysql_query ("UPDATE tasks SET position='$position' WHERE login='$login' AND id='$id'",$db);
}
else if ($change=='down' AND $pos!=1)
{
$position=$pos-1;
$result4 = mysql_query ("SELECT * FROM tasks WHERE login='$login' AND id_project='$id_project' AND position='$position'",$db);
$myrow4 = mysql_fetch_array($result4);
$new_position=$myrow4[position]+1;
$result5 = mysql_query ("UPDATE tasks SET position='$new_position' WHERE login='$login' AND id='$myrow4[id]'",$db);
$result6 = mysql_query ("UPDATE tasks SET position='$position' WHERE login='$login' AND id='$id'",$db);
}
else
{
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head><body><p><font size='3'><strong></body></html>" ;
exit();
}

if ($result5=='TRUE' AND $result6=='TRUE')
{
echo "<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head><body><p><font size='3'><strong></body></html>" ;
}
?>