<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>南京工业大学电气工程与控制科学学院时间管理网站时间记录页面</title>
<!--Custom Theme files-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<!-- Custom Theme files -->
<link href="/time/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/time/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--web-fonts-->
<link href='http://fonts.useso.com/css?family=Jura:400,300,500,600' rel='stylesheet' type='text/css'>
<script src="/time/Public/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="/time/Public/js/jquery.mmenu.min.all.js?v=5.4.4"></script>
<!-- //js -->
<!-- chart -->
<script src="/time/Public/js/Chart.js"></script>
<!-- //chart -->
<style>

   .data_style1{
     margin-left:25%;
	 text-align:center;
	
   }
   .data_style2{
     
	 text-align:center;
	
   }
   
   .space_style{
     text-align:center;
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
    <div class="alert alert-info">选择查询时间记录&nbsp &nbsp &nbsp &nbsp &nbsp </div>
</div>
</br></br>			
<!--       数据采集部分    -->	
<form action = "/time/index.php/Home/Time/timetrace.html?year=2016-2017&term=1&weeks=1" method = "get">
    <div class="data_style1">
					<div class="input-group input-group-mg ">
					      <label>学年</label>
					      <select class="form-control" name="year">
						  <option value="2015-2016" <?php if(I('get.year',-1)=='2015-2016') echo 'selected';?> >2015-2016</option>
						  <option value="2016-2017"<?php if(I('get.year',-1)=='2016-2017') echo 'selected';?> >2016-2017</option>
						  <option value="2017-2018"<?php if(I('get.year',-1)=='2017-2018') echo 'selected';?> >2017-2018</option>
						  <option value="2018-2019"<?php if(I('get.year',-1)=='2018-2019') echo 'selected';?> >2018-2019</option>
						  <option value="2019-2020"<?php if(I('get.year',-1)=='2019-2020') echo 'selected';?> >2019-2020</option>
						  <option value="2020-2021"<?php if(I('get.year',-1)=='2020-2021') echo 'selected';?> >2020-2021</option>
					      </select>
					</div>
					<div class="input-group input-group-mg ">
						   <label>学期</label>
						  <select class="form-control" name="term">
								<option value="1"  <?php if(I('get.term',-1)==1||I('get.term',-1)==-1){echo "selected";} ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;</option>
							 <option value="2"  <?php if(I('get.term',-1)==2){echo "selected";}?> > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;</option>
						   </select>
					</div>
		            <div class="input-group input-group-mg ">
                           <label>周次</label>
                               <select class="form-control" name="weeks">
										<option value="1"   <?php if(I('get.weeks',-1)==1||I('get.weeks',-1)==-1){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;</option>
									 <option  value="2" <?php if(I('get.weeks',-1)==2){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;</option>
									 <option value="3"<?php if(I('get.weeks',-1)==3){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;</option>
									 <option value="4"<?php if(I('get.weeks',-1)==4){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;</option>
									 <option value="5"<?php if(I('get.weeks',-1)==5){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5&nbsp;</option>
									 <option value="6"<?php if(I('get.weeks',-1)==6){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6&nbsp;</option>
									 <option value="7" <?php if(I('get.weeks',-1)==7){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7&nbsp;</option>
									 <option value="8"<?php if(I('get.weeks',-1)==8){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8&nbsp;</option>
									 <option value="9"<?php if(I('get.weeks',-1)==9){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9&nbsp;</option>
									 <option value="10"<?php if(I('get.weeks',-1)==10){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10&nbsp;</option>
									 <option value="11"<?php if(I('get.weeks',-1)==11){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11&nbsp;</option>
									 <option value="12"<?php if(I('get.weeks',-1)==12){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12&nbsp;</option>
									 <option value="13"<?php if(I('get.weeks',-1)==13){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13&nbsp;</option>
									 <option value="14"<?php if(I('get.weeks',-1)==14){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14&nbsp;</option>
									 <option value="15"<?php if(I('get.weeks',-1)==15){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15&nbsp;</option>
									 <option value="16"<?php if(I('get.weeks',-1)==16){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16&nbsp;</option>
									 <option value="17"<?php if(I('get.weeks',-1)==17){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17&nbsp;</option>
									 <option value="18"<?php if(I('get.weeks',-1)==18){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18&nbsp;</option>
									 <option value="19"<?php if(I('get.weeks',-1)==19){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19&nbsp;</option>
									 <option value="20"<?php if(I('get.weeks',-1)==20){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20&nbsp;</option>
									 <option value="21"<?php if(I('get.weeks',-1)==21){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;21&nbsp;</option>
									 <option value="22"<?php if(I('get.weeks',-1)==22){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;22&nbsp;</option>
									 <option value="23"<?php if(I('get.weeks',-1)==23){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;23&nbsp;</option>
									 <option value="24"<?php if(I('get.weeks',-1)==24){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;24&nbsp;</option>
									 <option value="25"<?php if(I('get.weeks',-1)==25){echo "selected";}?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;25&nbsp;</option>
			                 </select>
                    </div>
		   
    </div> 		
                            </br>	
		                    <button class="btn btn-large btn-block btn-primary" type="submit" id = "submit">查询</button>	
	 
	                        </br>
</form>							
	<div class = "space_style">
                  <div class="alert alert-info">该周的历史填报记录&nbsp &nbsp &nbsp &nbsp &nbsp </div>
    </div>
	  </br></br>
	  <!--
    <div>
        <table class="table table-striped">
		      <tr class="error">
                   <td>类目</td>
                   <td>内容</td>
              </tr>
              <tr class="success">
                   <td>星期</td>
                   <td>星期一</td>
              </tr>
			  <tr class="success">
                   <td>课堂学习</td>
                   <td>1</td>
              </tr>
			  <tr class="success">
                   <td>课外讲座</td>
                   <td>2</td>
              </tr>
			  <tr class="success">
                   <td>早晚自习</td>
                   <td>1</td>
              </tr>
			  <tr class="success">
                   <td>人际交往</td>
                   <td>2</td>
              </tr>
			  <tr class="success">
                   <td>体育锻炼</td>
                   <td>1</td>
              </tr>
			  <tr class="success">
                   <td>科技创新</td>
                   <td>1</td>
              </tr>
			  <tr class="success">
                   <td>上网游戏</td>
                   <td>2</td>
              </tr>
			  <tr class="success">
                   <td>内务卫生</td>
                   <td>1</td>
              </tr>
			  <tr class="info">
                   <td>填报日期</td>
                   <td>2016-2017</td>
              </tr>
        </table>
    </div>-->
<section class="ac-container">
        <?php $count=0; foreach($info as $k=>$v){ $count++;?>
		   <div>
		        <input id="ac-<?php echo ($count); ?>" name="accordion-1" type="checkbox" />
			    <label for="ac-<?php echo ($count); ?>" class="grid<?php echo ($count); ?>"><i></i>	<?php
 switch($info[$k]['xq']){ case 1: echo"星期一"; break; case 2: echo"星期二"; break; case 3: echo"星期三"; break; case 4: echo"星期四"; break; case 5: echo"星期五"; break; case 6: echo"星期六"; break; case 7: echo"星期天"; break; } ?></label>
							<table class="table table-striped">
									  <tr class="error">
										   <td>类目</td>
										   <td>内容</td>
									  </tr>
									  <tr class="success tron" >
										   <td>课堂学习</td>
										   <td><?php echo $info[$k]['ktxx'];?></td>
									  </tr>
									  <tr class="success tron">
										   <td>课外讲座</td>
										   <td><?php echo $info[$k]['kwjz'];?></td>
									  </tr>
									  <tr class="success tron">
										   <td>早晚自习</td>
										   <td><?php echo $info[$k]['zwzx'];?></td>
									  </tr>
									  <tr class="success tron">
										   <td>人际交往</td>
										   <td><?php echo $info[$k]['rjjw'];?></td>
									  </tr>
									  <tr class="success tron">
										   <td>体育锻炼</td>
										   <td><?php echo $info[$k]['tydl'];?></td>
									  </tr>
									  <tr class="success tron">
										   <td>科技创新</td>
										   <td><?php echo $info[$k]['kjcx'];?></td>
									  </tr>
									  <tr class="success tron">
										   <td>上网游戏</td>
										   <td><?php echo $info[$k]['swyx'];?></td>
									  </tr>
									  <tr class="success tron">
										   <td>内务卫生</td>
										   <td><?php echo $info[$k]['nwws'];?></td>
									  </tr>
									  <tr class="info tron">
										   <td>填报日期</td>
										   <td><?php echo $info[$k]['today'];?></td>
									  </tr>
                        </table>
			</div>
	<?php }?>
				</section>	
</body>
</html>
<script type="text/javascript"  src="/time/Public/js/tron.js"></script>