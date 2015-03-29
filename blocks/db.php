<?
session_start();
$db=mysql_connect("localhost","bloguser","12345");
mysql_select_db("todo_list",$db);
if(!mysql_set_charset('utf8')) mysql_query("SET NAMES 'utf8'");
header("Content-type: text/html; charset=utf-8");
if (!empty($_SESSION['login']) and !empty($_SESSION['password']))
{
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$result = mysql_query("SELECT * FROM users WHERE login='$login' AND password='$password'",$db); 
$myrow = mysql_fetch_array($result);
}
?>