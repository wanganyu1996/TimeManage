<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>南京工业大学电气工程与控制科学学院时间管理网站时间填报页面</title>
<!--Custom Theme files-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="/time/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/time/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="/time/Public/css/jquery.mmenu.all.css?v=5.4.4" />
<script src="/time/Public/js/jquery-1.11.1.min.js"></script> 
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
  
  
  <div class = "alert alert-info">同学请在规定时间内填报<span style = "color:red">(18点~24点)</span><span style = "color:red" id = "showWeek"></span></div>
</div>	
</br></br>
		
<!--       数据采集部分    -->	
    <div class="data_style1">
            <div class="input-group input-group-mg ">
               <label>课堂学习</label>
               <select class="form-control">
			         <option value = "0">0</option>
			         <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
			</div>
		   <div class="input-group input-group-mg ">
               <label>课外讲座</label>
              <select class="form-control">
			          <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
		   <div class="input-group input-group-mg ">
               <label>早晚自习</label>
             <select class="form-control">
			          <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
		  <div class="input-group input-group-mg ">
               <label>人际交往</label>
             <select class="form-control">
			         <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
		  <div class="input-group input-group-mg ">
               <label>体育锻炼</label>
             <select class="form-control">
			         <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
		   <div class="input-group input-group-mg ">
               <label>科技创新</label>
             <select class="form-control">
			          <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
		  <div class="input-group input-group-mg ">
               <label>上网游戏</label>
              <select class="form-control">
			         <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
		   <div class="input-group input-group-mg ">
               <label>内务卫生</label>
              <select class="form-control">
			           <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
            <div class="input-group input-group-mg ">
               <label>社团活动</label>
              <select class="form-control">
			           <option value = "0">0</option>
			        <option value="1">1</option>
			         <option value="2">2</option>
			         <option value="3">3</option>
			         <option value="4">4</option>
			         <option value="5">5</option>
			         <option value="6">6</option>
			         <option value="7">7</option>
			         <option value="8">8</option>
			   </select>
           </div>
		   
	</div> 
	  </br></br>    
    <button class="btn btn-large btn-block btn-primary" type="button" id = "submit">填报</button>	
	 
	<div class="graph-info">
				<div class="graph-text">
					<ul>
						<li><span class="dott blue"> </span><span style = "color:purple;font-weight:bolder;">您今天的时间走势</span>  </li>
					</ul>
				</div>
				<div class="month-graph effect21">
						<canvas id="line" height="195px" width="400px" style="width:300px; height: 300px;"></canvas>
	<script>
		var allTypeTime=0;      
		//将周次显示到前台页面
		//var showWeekId = document.getElementById("showWeek");
		//showWeekId.innerHTML = "    第"+week+"周";
        $(function(){
							 array=new Array(9);//该数组存储学生提交的数据	
						    
							$('#submit').click(function(){
							   if(false)
	                           {
		                          alert("请在规定时间内填写");
		                          $(this).prop('disabled',true).css('background-color','black');//这两条语句的执行效果是一样的
								  return false;
	                           }
							   else{
							      
								   // array1 = new  Array();
								    var i=0;
							        var temp;
							      //遍历select里的集合，把里面相应的值转化为float数，添加至数组里。
							      $('select').each(function(){
									temp=$(this).children('option:selected').val();
								 	array[i++]=parseInt(temp);
								  })
								  var allTime=0;//定义总时间
                                  for(var k=0;k<array.length;k++)
                                  {
                                      allTime+=array[k];							  
							      }
							      if(allTime==0)
							      {
							       alert('请填写时间');
								   return false;
							      }
							      if(allTime>24){
							    	  alert("您填写的时间超过了24小时，不符合客观事实！请重新填写！");
							    	  return false;
							      }
							   }
							   var lineChartData = {
								labels : ["课堂学习","课外讲座","早晚自习","人际交往","体育锻炼","科技创新","上网游戏","内务卫生","社团活动"],
								
								datasets : [
									{
										fillColor : "rgba(135, 138, 238, 0.88)",
										strokeColor : "rgba(135, 138, 238, 0.85)",
										pointColor : "rgba(135, 138, 238, 0.85)",
									    data : array
									}
									
								]
							   }
							   
							   var myLine = new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
							
							   allTypeTime = array[0];
							 
							 for(var i = 1 ; i < array.length ; i++){
								allTypeTime=allTypeTime+","+array[i];
							 }
							 
							   //下面调错使用
							 //   alert(allTypeTime);
							  //  alert(schoolYear);
							   // alert(term);
							   // alert(week);
								
								
							  $.ajax({
								   url:'/time/index.php/Home/Time/timemanage',
								   type:'POST',
								   data:{items:allTypeTime},
								   //dataType:'json',
								   success:function(res){
									   alert(res.info);
								   } 
								});
							})
						 })  
						   
	</script>
				</div>
			</div>
		</div>
		<!--//login-graph-->	
	</div>
	<div class="copyright">
		<p>Copyright @南京工业大学绿荫工作室</p>
	</div>					
</body>
</html>