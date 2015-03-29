<?
if(isset($_GET['id']))
{
$id=$_GET['id'];

echo "<div align='center'>
			<h3>Do You want to mark a task as done?</h3>
			<p><form action='done_task.php?id=$id' method='post'>
			<input type='hidden' name='done' value='1'>
<button type='submit' name='order' class='button' style='width:70px; height:25px;'>Yes</button>
</p>
</form>
</div>";
}


if(isset($_GET['del_id']))
{
$del_id=$_GET['del_id'];

echo "<div align='center'>
			<h3>Do You want to delete the task?</h3>
			<p><form action='del_task.php?id=$del_id' method='post'>
<button type='submit' name='order' class='button' style='width:70px; height:25px;'>Yes</button>
</p>
</form>
</div>";
}


if(isset($_GET['del_project']))
{
$del_project=$_GET['del_project'];

echo "<div align='center'>
			<h3>Do You want to delete the project?</h3>
			<p><form action='del_project.php?id=$del_project' method='post'>
<button type='submit' name='order' class='button' style='width:70px; height:25px;'>Yes</button>
</p>
</form>
</div>";
}


?>

