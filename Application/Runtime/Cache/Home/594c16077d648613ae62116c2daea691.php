<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>南京工业大学电气工程与控制科学学院时间管理网站查询成绩页面</title>
<!--Custom Theme files-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="/time/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/time/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--web-fonts-->
<link href='http://fonts.useso.com/css?family=Jura:400,300,500,600' rel='stylesheet' type='text/css'>
<link type="text/css" rel="stylesheet" href="/time/Public/css/jquery.mmenu.all.css?v=5.4.4" />
<script src="/time/Public/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="/time/Public/js/jquery.mmenu.min.all.js?v=5.4.4"></script>
<script src="/time/Public/js/Chart.js"></script>
<style>
   .data_style1{
     margin-left:25%;
	 text-align:center;
	 
   }
   .data_style2{
     margin-left:25%;
	 text-align:center;
	 
   }
   
   .space_style{
     
	 background:lightblue;
	 height:2em;
   }
</style>
</head>
<body>
	
	<div class="main">
	<div class="mobile-graph profile">
	<a href = "<?php echo U('/');?>">返回首页</a>			
<div class = "space_style">
  <div class = "alert alert-info">成绩查询&nbsp &nbsp &nbsp &nbsp &nbsp </div>
</div>	
</br></br>
		
<form action="/time/index.php/Home/Score/showscore.html" method="get">
           <div class="input-group input-group-mg">
              <span class="input-group-addon">学年</span>
			  <select class="form-control"  name="year" id="selectyear">
			      
			      <option value="2015-2016"<?php if(I('get.year',-1)=='2015-2016') echo 'selected';?> >2015-2016</option>
			      <option value="2016-2017"<?php if(I('get.year',-1)=='2016-2017') echo 'selected';?> >2016-2017</option>
			      <option value="2017-2018"<?php if(I('get.year',-1)=='2017-2018') echo 'selected';?> >2017-2018</option>
			      <option  value="2018-2019"<?php if(I('get.year',-1)=='2018-2019') echo 'selected';?> >2018-2019</option>
			      <option value="2019-2020"<?php if(I('get.year',-1)=='2019-2020') echo 'selected';?> >2019-2020</option>
			      <option value="2020-2021"<?php if(I('get.year',-1)=='2020-2021') echo 'selected';?> >2020-2021</option>
			      <option value="2021-2022"<?php if(I('get.year',-1)=='2021-2022') echo 'selected';?> >2021-2022</option>
			      <option value="2022-2023"<?php if(I('get.year',-1)=='2022-2023') echo 'selected';?> >2022-2023</option>
			  
			  </select>
		   </div>  
		   </br> 
		   <div class="input-group input-group-mg">
              <span class="input-group-addon">学期</span>
			  <select class="form-control" id="selectterm" name="term">
			      <option value="1" <?php if(I('get.term',-1)){echo "selected";}?> >1</option>
			      <option value="2" <?php if(I('get.term',-1)==2){echo "selected";}?> >2</option>
			  </select>
		   </div>  
		   
		   </br>   
           <button class="btn btn-large btn-block btn-primary" type="submit" id = "submit">查询</button>
</form>
</br></br>

<div class = "space_style">
  <div class = "alert alert-info">查询结果&nbsp &nbsp &nbsp &nbsp &nbsp </div>
</div>	
</br></br>
<!--学生基本信息-->
<div>
        <table class="table table-striped">
		      <tr class="error">
                   <td>学年</td>
                   <td><?php echo I('get.year');?></td>
              </tr>
			  <tr class="error">
                   <td>学期</td>
                   <td><?php echo I('get.term'); ?></td>
              </tr>
              <tr class="error">
                   <td>学号</td>
                   <td><?php echo (session('stuid')); ?></td>
              </tr>
			  <tr class="error">
                   <td>姓名</td>
                   <td><?php echo (session('stuname')); ?></td>
              </tr>
        </table>
</div>		 
<!--学生成绩-->
<div class = "space_style">
  <div class = "alert alert-info">学生成绩&nbsp &nbsp &nbsp &nbsp &nbsp </div>
    <table class="table table-striped">
		       <tr class="info"><th>课程名</th><th>学分</th><th>选修状态</th><th>分数</th></tr>
		       <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="tron"><td><?php echo ($v["course_name"]); ?></td><td><?php echo ($v["course_xf"]); ?></td><td><?php echo ($v["course_xxzt"]); ?></td><td><?php echo ($v["course_score"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
		       
		   </table>
		   <div id="page"><?php echo ($pagelist); ?></div>
</div>	
</body>
</html>
 <script type="text/javascript"  src="/time/Public/js/tron.js"></script>