<? 
include ("blocks/db.php");

if (isset($_GET['id']))
{
$id = $_GET['id'];
}

$result1 = mysql_query ("SELECT * FROM project WHERE login='$login' AND id='$id'",$db);
$myrow1= mysql_fetch_array($result1);

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
print <<<HERE
<div align='center'>
<table class='post' align='center' border='0' cellspacing='0' cellpadding='0'>
<tr>
<td align='left'>
<br>
<form name="form" action="up_project.php?id=$id" method="post">
<div style='padding:10px;'>Project name<br>
<input class="validate[required] text-input" name="project_name" type="text" size="100" value='$myrow1[project_name]' id='project'><br>
<span id="charlimitinfo"></span></div>

<div style='padding:10px;'>
<button type="submit" class='button' style='width:150px;'>Update project</button></div><br>
</form>
<div style='padding:10px;'>
<a  href='content.php?del_project=$id' class='gallery'><button type="submit" class='button' style='width:150px;'>Delete project</button></a></div><br>
<br>
</td>
</tr>
</table>

</div>
HERE;

?>


</body>

    <script language="javascript">
    function limitChars(textid, limit, infodiv)
    {
    var text = $('#'+textid).val(); 
    var textlength = text.length;
    if(textlength > limit)
    {
    $('#' + infodiv).html('<font color="#CC3300">The name should be no more than '+limit+' characters!</font>');
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

<link type="text/css" href="latest.css" rel="Stylesheet" />
<script type="text/javascript" src="ui.datepicker.js"></script>
<script>
$(".datepickerTimeField").datepicker({
	yearRange: "-0:+20",
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd.mm.yy',
		firstDay: 1, changeFirstDay: false,
		navigationAsDateFormat: true,
		duration: 0// отключаем эффект появления
});
</script> 

</html>