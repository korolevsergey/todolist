<? 
include ("blocks/db.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SIMPLE TODO LIST</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="description" content="SIMPLE TODO LIST">
<meta name="keywords" content="  ">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
</head>
<body>
<div align='center'><h1><strong>SIMPLE TODO LIST</strong></h1><h4>FROM RUBY GARAGE</h4></div>

<?
if (!isset($login) or $login=='') {

print <<<HERE
<div align='center'>

<table class='post' align='center' border='0' cellspacing='0' cellpadding='0'>
<tr>
<td>
<br>
<form name="form" action="testreg.php" method="post">
Login<br>
<input class="validate[required] text-input" name="login" type="text" size="20" maxlength="15" placeholder="Login"><br>

Password<br>
<input class="validate[required] text-input" name="password" type="password" size="20" maxlength="15" placeholder="Password"><br><br>

<button type="submit" class='button' style='width:100px;'>Login</button><br><br>
</form>
<br>
</td>
</tr>
</table>

<div id="pokazat" >
<a style='text-decoration: none; color:#336699;' href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;"><strong>Registration</strong></a>
</div>

<div id="skryt" style="display:none">
<div align='center'>
			<h4>Registration</h4>
			<p><form action='save_user.php' method='post'>
Login<br><input class="validate[required,custom[onlyLatinLetter],length[4,15]] text-input" name="login" size="26" maxlength="30" id='comment'><br>
Password<br><input class="validate[required,custom[onlyLatinLetter],length[4,15]] text-input" type="password" name="password" id="password" size="26" maxlength="30"><br><br>
<button type='submit' name='order' class='button' style='width:100px;'>Sign up</button>
</p>
</form>
</div>
<div><a style='color:#333333;' href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><font size='1'>Close</font></a></div></p>
</div>
</div>
HERE;
}
else
{
echo "<div align='center'><a style='color:#336699;' href='exit.php'><strong>Logout</strong></a><br>";
$result3 = mysql_query ("SELECT * FROM project WHERE login='$login'",$db);
if (mysql_num_rows($result3) > 0)
{
$myrow3 = mysql_fetch_array($result3);
do 
{
printf ("
<table class='post1' width='700px' align='center' valign='top' border='0' cellspacing='0' cellpadding='0'>
<tr style='background:#416fa9;'>
<td>
<div class='holder1'>
<div class='nav_title' style='padding:5px;'><img style='padding-right:10px;' src='img/book.png' width='15' alt='up'><font color='#ffffff'><strong>%s</strong></font></div>

<div class='block1' align='right' style='vertical-align: middle; padding-top:5px;
padding-bottom:5px;''>
<div class='nav_title' align='center' valign='middle'>
<a  href='update_project.php?id=%s' ><img src='img/pen.png' width='15' alt='update' title='update'></a>
</div>
<div class='nav_title' align='center' valign='middle'>
<a  href='content.php?del_project=%s' class='gallery'><img src='img/busket.png' width='15' alt='delete' title='delete'></a>
</div>
</div>

</div>
</td>
</tr>
<tr style='background:#eee;'>
<td style='padding:10px;'>
<div style='padding-right:10px; float:left;'>
<img src='img/plus.png' width='40' alt='plus'>
</div>
<div>
<form action='add_task.php?id_project=%s' method='post' class='form-wrapper'>
	<input class='validate[required] text-input' name='task_name' placeholder='Start typing here to create a task...'>
	<button type='submit'>Add Task</button>
</form>
</div>
</td>
</tr>

", $myrow3["project_name"],$myrow3["id"],$myrow3["id"],$myrow3["id"]);

$result4 = mysql_query ("SELECT * FROM tasks WHERE login='$login' AND id_project='$myrow3[id]' ORDER BY position DESC",$db);
if (mysql_num_rows($result4) > 0)
{
$myrow4 = mysql_fetch_array($result4);
do 
{
if ($myrow4[done]==1)
{
$done='checked';
$done1='text-decoration:line-through;';
}
else
{
$done='';
$done1='';
}


if ($myrow4[deadline]!='0000-00-00')
{
$date=date("Y-m-d");
$myrow4[deadline] = date("Y-m-d", strtotime($myrow4[deadline]));

if($date > $myrow4[deadline] AND $myrow4[done]!=1)
	{
     $deadline1="color:#CC0000";
	}
    else
	{
     $deadline1="color:#777777";
	}
}
else
{
$deadline1="color:#777777";
}

printf ("
<tr>
<td>
<div class='holder'>
<div class='nav_title' style='vertical-align: middle; padding-top:10px;
padding-bottom:10px;'>
<a  href='content.php?id=%s' class='gallery'><input type='checkbox' value='' $done></a>
</div>

<a  style='color:#777777; text-decoration:none;' href='update.php?id=%s'><div class='class8' style='word-wrap: break-word; width: 550px; $done1 $deadline1' align='left'>
%s
</div></a>


<div class='block' align='right' style='vertical-align: middle; padding-top:15px;
padding-bottom:10px;'>
<div class='nav_title' align='center' valign='middle'>
<a  href='change_pos.php?id=%s&pos=%s&id_project=%s&change=up' ><img src='img/up.png' width='10' alt='up' title='up'></a><br><a  href='change_pos.php?id=%s&pos=%s&id_project=%s&change=down' ><img src='img/down.png' width='10' alt='down' title='down'></a>
</div>
<div class='nav_title' align='center' valign='middle'>
<a  href='update.php?id=%s' ><img src='img/pen.png' width='20' alt='update' title='update'></a>
</div>
<div class='nav_title' align='center' valign='middle'>
<a  href='content.php?del_id=%s' class='gallery'><img src='img/busket.png' width='15' alt='delete' title='delete'></a>
</div>

</div>
</div>
</td>
</tr>
",$myrow4["id"],$myrow4["id"],$myrow4["task_name"],$myrow4["id"],$myrow4["position"],$myrow4["id_project"],$myrow4["id"],$myrow4["position"],$myrow4["id_project"],$myrow4["id"],$myrow4["id"]);
}
while ($myrow4 = mysql_fetch_array($result4));
echo "</table>";
}
else
{
echo "</table>";
}
}
while ($myrow3 = mysql_fetch_array($result3));
echo "</div>";
}
else
{
echo "<br><div align='center'><strong>You do not have projects. Create a new TODO List</strong></div></div>";
}
print <<<HERE
<br>
<div align='center'>
<div id="pokazat" >
<a style='text-decoration: none; color:#336699;' href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;" ><button style='width:180px' class='button'>+ Add TODO List</button></a>
</div>

<div id="skryt" style="display:none">
<div align='center'>
			<p><form action='save_project.php' method='post'>
<strong>Project name</strong> <input class="validate[required] text-input" name="project_name" size="70" maxlength="80" id='project'>
<br>
<span id="charlimitinfo"></span><br>
<button type='submit' name='order' class='button' style='width:150px;'>Add TODO List</button>
</form>
</div>
<div><a style='color:#333333;' href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><font size='1'>Close</font></a></div></p>
</div>
</div>

HERE;
}
?>


</body>

    <script language="javascript">
    function limitChars(textid, limit, infodiv)
    {
    var text = $('#'+textid).val(); 
    var textlength = text.length;
    if(textlength > limit)
    {
    $('#' + infodiv).html('<font color="#CC3300">The name should be no more than '+limit+' characters.!</font>');
    $('#'+textid).val(text.substr(0,limit));
    return false;
    }
    else
    {
    $('#' + infodiv).html('<font color="#228B22">You left '+ (limit - textlength) +' characters.</font>');
    return true;
    }
    }
  $(function(){
    $('#project').keyup(function(){
    limitChars('project', 50, 'charlimitinfo');
    })
    });
  </script>

  <link rel="stylesheet" href="form/css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<script src="form/js/jquery.validationEngine.js" type="text/javascript"></script>


<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<script type="text/javascript">

function popup_position(){
         var my_popup = $('.fancybox-loading'), // наш попап
                 my_popup_w = my_popup.width(), // ширина попапа
                 my_popup_h = my_popup.height(), // высота попапа
                 popup_half_w = my_popup_w/2, // половина ширины попапа
                 popup_half_h = my_popup_h/2, // половина высоты попапа
                 win_w = $(window).width(), // ширина окна
                 win_h = $(window).height(); // высота окна
 
         if ( win_w > my_popup_w ) { // если ширина окна больше ширины попапа
                 my_popup.css({'margin-left':-popup_half_w, 'left': '50%'});
         }
         if ( win_w < my_popup_w ) { // если ширина окна меньше ширины попапа                  
                 my_popup.css({'margin-left': 5, 'left': '0'});
         }
         if ( win_h > my_popup_h ) { // если высота окна больше ширины попапа
                 my_popup.css({'margin-top': -popup_half_h, 'top':'50%'});
         }
         if ( win_h < my_popup_h ) { // если высота окна меньше ширины попапа
                 my_popup.css({'margin-top': 5, 'top': '0'});
         }
 }

 $(document).ready(function(){	
popup_position();
});
$(window).resize(function(){	
popup_position();
});

		$(document).ready(function() {


$("a.gallery").fancybox(
			{						
"padding" : 10, 
"imageScale" : true, 
			"zoomOpacity" : false,	
			"zoomSpeedIn" : 300,	
			"zoomSpeedOut" : 300,	
			"frameWidth" : 500,	 
			"frameHeight" : 500, 
			"overlayShow" : true, 
			"overlayOpacity" : 0.3,	
			"hideOnContentClick" :false, 	
			"centerOnScroll" : true 		
				
			});
});

</script>


</html>