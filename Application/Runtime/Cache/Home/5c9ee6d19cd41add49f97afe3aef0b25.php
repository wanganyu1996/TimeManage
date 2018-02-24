<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>南京工业大学电气工程与控制科学学院时间管理网站登录界面</title>
<!--Custom Theme files-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="/time/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/time/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="/time/Public/js/jquery.min.js"></script> 

</head>
<body>
	<h1>时间管理填报系统</h1>
	<!-- main -->
	<div class="main">
		<!--login-profile-->
		<div class="login-form">
			
			<div class="clear"> </div>
		</div>
		<!--login-profile-->
		<!--signin-form-->
		<div class="signin-form profile">
			<h3> 学生登录 </h3>
			<div class="login-form">
					<input id = "stuid" type="text" placeholder="填写学号" required="">
					<input id = "password" type="password" placeholder="* * * * * * * * * *" required="">
					<button class="btn btn-large btn-block btn-primary" type="submit" id = "submit">登录</button>
			</div>
			<p><a href="<?php echo U('Admin/Manager/login');?>"> TecLogin</a></p>
		</div>
	<div class="copyright">
		<p>Copyright @南京工业大学电气工程与控制科学学院</p>
	</div>					
</body>
</html>
<script>
$(function(){
      var ID=/^[0-9]{10,10}$/;//匹配学号正则表达式
    $('#submit').click(function(){
  	       var stuid=$('#stuid').val();
	       var  password=$('#password').val();
		   
		   if(stuid=="" || password==""){
		       alert('输入不得为空');
			   return false;
		   }
		   		  
		   if(!ID.exec(stuid))
		   {
		      alert('学号输入格式有误');
			  return false;
		   }
		   
	      if(stuid!="" && password!=""){
			     $.ajax({
			    	url:'/time/index.php/Home/User/login',
				    type:'POST',
				    data:{stuid:stuid,password:password},
				     dataType:"json",
				    success:function(res){
         	           alert(res.info);
         	           if(res.url == '' || res.url == null || res.url == undefined)
         	        	   return false;
					   //window.open(res.url);
         	           window.location.href=res.url;//这样做可以避免另开一个窗口
					   //window.location.reload=res.url;
				    }
				    
			     });   
			    
	        }
	 })
})
</script>