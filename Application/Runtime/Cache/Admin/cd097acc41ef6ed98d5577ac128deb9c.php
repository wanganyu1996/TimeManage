<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>南京工业大学电气工程与控制科学学院时间管理网站后台学生信息页面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="/time/Public/css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="/time/Public/js/jquery.min.js"></script>
<style>
 .body{
   margin:0px;
   padding:0px;
 }
 .contain{
  width:auto;
  height:1000px;
 }
 .top{
  margin-top:10px;
  width:auto;
  height:50px;
  text-align:center;
 } 
 .main{
  width:auto;
  height:500px;
 text-align:center;
 }
.chooseClass{
 float:left;
 width:auto;
 height:60px;
 margin-left:150px;
 margin-top:10px;
 padding-left:120px;
}
.search{
  width:auto;
  height:60px;
  float:left;
  margin-top:10px;
  padding-top:30px;
  padding-left:20px;
.bottom{
  text-align:center;
}
</style>
</head>
<body>
     <div class="contain">
	     
	       
		   <div class="main">	
		     <div class="alert alert-info" role="alert"><font size="5px">班级列表</font></div>
		   <div class="table-responsive">
		   
		   
		   
		   <table class="table table-striped">
			   <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr class="tron">
			     <td><font size="4px" color="blue"><?php echo ($data["classname"]); ?></font></td>
			     <td><a href="/time/index.php/Admin/Time/showtime?class=<?php echo ($data["classname"]); ?>">该班学生信息查看</a></td>
			     <td><a href="/time/index.php/Admin/Time/showchart?class=<?php echo ($data["classname"]); ?>">分类统计图显示</a></td>
			 </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		     
		   </table>
		    <div style="font-weight:bold"><?php echo ($pagelist); ?></div>
		   </div> 
		   
		   </div>
	         
	       <div class="bottom">
		     <div class="main">	
		           <div class="alert alert-info" role="alert"><font size="5px">单个学生信息查看</font><font size="4px" color="red">（注意学号或者姓名填一个即可，也可都填）</font></div>
		        <div class="table-responsive">
	             <form action ="/time/index.php/Admin/Time/showonetime" method="get">
						   <div class="input-group input-group-lg">
							  <span class="input-group-addon" id="sizing-addon1">学号</span>
							  <input type="text"  name="stuid" class="form-control" placeholder="学号" aria-describedby="sizing-addon1">
						   </div>
						   <div class="input-group input-group-lg">
							  <span class="input-group-addon" id="sizing-addon1">姓名</span>
							  <input  name="stuname" type="text"  class="form-control" placeholder="姓名" aria-describedby="sizing-addon1">
						   </div>
                          <button type="submit" class="btn btn-success" id="submit">查看</button>	
                 </form>
		    </div>
	 
	      </div>

   
</body>
</html>
<script type="text/javascript"  src="/time/Public/js/tron.js"></script>