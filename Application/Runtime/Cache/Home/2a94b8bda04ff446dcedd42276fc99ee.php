<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>南京工业大学电气工程与控制科学学院时间管理网站主页</title>
<!--Custom Theme files-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="/time/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
  .banner-bottom h3{
      font-size: 1.5em;
      color: #fff;
	  font-family:华文新魏;
	  font-weight:bolder;
	  color:black;
   }
   .banner-bottom h3 a{
     color:black;
   }
   .banner-bottom .styleA{
     color: #fff;
	 font-size: 1.4em;
	 font-family:华文新魏;
   }
   
   .styleA{
	
   	font-family:华文新魏;
   	font-weight:bolder;
   	color:white;
   }
</style>
</head>
<body>
	<div class="main">
	    <a  class = "styleA" href = "<?php echo U('dologout');?>">退出</a> 
		<div class="login-form">
			<div class="banner">
				<div class="header-top">
					<ul>
						<li id="infoWeek"></li>
						 <script>
								weeks=new Array(8);
								weeks[0]="星期一";
								weeks[1]="星期二";
								weeks[2]="星期三";
								weeks[3]="星期四";
								weeks[4]="星期五";
								weeks[5]="星期六";
								weeks[6]="星期日";
							   date = new Date();
							   var nowweek = date.getDay();
							   var nowyear = date.getFullYear();
							   var nowmonth = date.getMonth()+1;
							   var nowday = date.getDate();
							   var info = "<font size='4px' face='华文行楷'>"+nowyear+"年"+nowmonth+"月"+nowday+"号"+"  "+weeks[nowweek-1]+"</font>";
							   var div = document.getElementById('infoWeek');
							   div.innerHTML=info;
			           </script>
					</ul>
				</div>
				
				<div class="banner-text">
				    
					<div class="menu">
						<span class="menu-icon"><a href="#"><img src="/time/Public/images/menu-icon.png" alt=""/></a></span>	
							<ul class="nav1">
								<li><a href="fillTime.html">时间填报</a></li>
								<li><a href="findTime.html">时间管理</a></li>
								<li><a href="findScore.html">成绩查询</a></li>
								<li><a href="modifyPass.html">密码修改</a></li>
							</ul> 	
							 <script>
							   $( "span.menu-icon" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								  });
								 });
							</script>
					</div>
					<div class="title">
						<div class="title-right">
							<h2>姓名: <?php echo (session('stuname')); ?></h2>
							<h6>班级: <?php echo ($class); ?></h6>
							<h6>导师:  <?php echo ($teaname); ?></h6>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
			</div>
			<div class="clear"> </div>
			<div class="banner-bottom">
			    <div class="banner-bottom-left">
					<a href="<?php echo U('Time/timemanager');?>" class = "styleA">时间填报</a>
				</div>
				<div class="banner-bottom-left">
					<a href="<?php echo U('Time/timetrace');?>" class = "styleA">时间查询</a>
				</div>
				 <div class="banner-bottom-left">
					<a href="<?php echo U('Score/showscore');?>" class = "styleA">成绩查询</a>
				</div>
				<div class="banner-bottom-left">
					<a href="<?php echo U('User/editpwd');?>" class = "styleA">密码修改</a>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>
	<div class="copyright">
		<p>南京工业大学电气工程与控制科学学院</p>
	</div>				
</body>
</html>