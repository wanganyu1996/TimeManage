<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>南京工业大学电气工程与控制科学学院时间管理网站后台显示时间页面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link href="/time/Public/css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="/time/Public/js/jquery.min.js"></script>
<style>
 .body{
  width:2000px;
  margin:0px;
  padding:0px;
 }
 .contain{
  width:auto;
  height:800px;
 }
 .top{
  width:auto
  height:100px;
  text-align:center;
 } 
 .main{
  width:auto;
  height:600px;
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
}
.pageinfo{
  width:auto;
  height:30px;
  text-align:center;
  font-family:bold;
			
}
th{
	text-align:center;
}
td{
	text-align:center;
}
</style>
</head>
<body>
     <div class="contain">
		   <div class="main">	
		     <div class="alert alert-info" role="alert" style="text-align:center"><font size="5px" >学生基本信息</font></div>
		   <div class="table-responsive">
		   <table class="table table-striped">
		       <tr>
		       <th>班级</th>
		       <th>学号</th>
		       <th>姓名</th>
		       <th>性别</th>
		       <th>身份证</th>
		       <th>手机</th>
		       <th>电子邮箱</th>
		       <th>时间查看</th>
		       </tr>
		       <?php foreach($info as $k=>$v): ?>
		       <tr class="tron">
		        <td><?php  echo $info[$k]['stuclass'];?></td>
		        <td><?php echo $info[$k]['stuid'];?></td>
		        <td><?php echo $info[$k]['stuname'];?></td>
		        <td><?php if($info[$k]['sex']==1){echo"男";}else{echo"女";}?></td>
		        <td><?php echo $info[$k]['idcard'];?></td>
		         <td><?php echo $info[$k]['phone'];?></td>
		          <td><?php echo $info[$k]['email'];?></td>
		          <td><a href="/time/index.php/Admin/Time/showonetime/stuid/<?php echo $info[$k]['stuid'];?>"><font color="red">时间查看</font></a></td>
		       </tr>
            <?php endforeach;?>		       
		   </table>
		   <div class="pageinfo" style="font-weight:bold;"> <?php echo ($pagelist); ?></div>
		   </div> 
		   </div>
	       <div class="bottom">
		   </div>
	 
	 </div>
</body>
</html>
<script type="text/javascript"  src="/time/Public/js/tron.js"></script>