<?php
session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (isset($_POST['login'])) {$login =$_POST['login']; }
if (isset($_POST['password'])) {$password =$_POST['password']; }

if (isset($_GET['login'])) {$login =$_GET['login']; }
if (isset($_GET['password'])) {$password =$_GET['password']; }

if (empty($login) or empty($password))
{
exit ("<p class='post5'><font size='3'><strong>Go back and fill in all fields!<strong></font></p>");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$login = trim($login);
$password = trim($password);


include ("blocks/db.php");


$result = mysql_query("SELECT id,login,password FROM users WHERE login='$login' AND password='$password'",$db); 
$myrow = mysql_fetch_array($result);
if (empty($myrow['id']))
{
exit ("<p class='post5'><font size='3'><strong>You entered an incorrect password or login.<strong></font></p>");
}
else {
          $_SESSION['password']=$myrow['password']; 
		  $_SESSION['login']=$myrow['login']; 
		  


if (isset($_POST['save'])){
setcookie("login", $_POST["login"], time()+9999999);
setcookie("password", $_POST["password"], time()+9999999);}
}	

echo header("Location: ".$_SERVER['HTTP_REFERER']);

?>
