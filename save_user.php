<? 
include ("blocks/db.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SIMPLE TODO LIST</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="description" content="Рушник - сайт знакомств для православных христиан, поможет найти свою любовь и друзей. Знакомства для любви, брака, серьезных отношений.">
<meta name="keywords" content="Православные знакомства, объявления, знакомство для брака, серьезных отношений, клуб православных друзей, анкеты, найти любовь.">
</head>

<body>
<div align='center'><h1><strong>SIMPLE TODO LIST</strong></h1><h4>FROM RUBY GARAGE</h4></div>
<div align='center'>
<h2>Registration</h2>
</div><br>


<?php
 
if (isset($_POST['password'])) { $password=$_POST['password'];}
if (isset($_POST['login'])) { $login = $_POST['login'];}


if ($login == '' OR $password == '')
{
exit ("<div align='center'><font size='3'>You have not entered all the information!
<a style='color:#CC0000' href=index.php>Go back!</a></font></div>"); 
}

$password = stripslashes($password);
$password = htmlspecialchars($password);
$password = trim($password);

$result1 = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow1 = mysql_fetch_array($result1);
if (!empty($myrow1['id']))
{
exit ("<div align='center'><font size='3'>
Sorry, you entered login is already registered. Enter another!
<a style='color:#CC0000' href=index.php>Go back!</a></font></div>"); 
}


$result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");

if ($result2=='TRUE')
{
unset($_SESSION['login']);
unset($_SESSION['password']);

$_SESSION['password']=$password; 
$_SESSION['login']=$login; 


echo "<html><head><meta http-equiv='Refresh' content='5'; URL=index.php'></head><body>
<div align='center'><font size='3'>
Registration was successful! <a style='color:#336699' href='index.php'>Go back!</a></font></div></body></html>" ;
}
else {
exit ("<div align='center'><font size='3'>Error! You are not logged in. <a style='color:#336699' href='index.php'>Go back!</a></font></div>"); //?eaa

     }
?>

</body>

</html>
