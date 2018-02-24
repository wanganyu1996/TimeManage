<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="/time/Public/Admin/css/admin.css" type="text/css" rel="stylesheet" />
    </head>
	<style>
	  #timenow{
	     width:800px;
		 height:30px;
		 color:gray;
		 font-size:15px;
		 padding-top:10px;
		 face:华文行楷;
		 font-weight:bold;
	  }
	   text{
	     width:800px;
		 height:50px;
		 color:gray;
		 font-size:15px;
		 padding-top:10px;
		 face:华文行楷;
		 font-weight:bold;
	   }
	
	</style>
    <body>
        <table cellspacing=0 cellpadding=0 width="100%" align=center border=0>
            <tr height=28>
                <td background=/time/Public/Admin/img/title_bg1.jpg><text>当前位置:</text> </td></tr>
            <tr>
                <td bgcolor=#b1ceef height=1></td></tr>
            <tr height=20>
                <td background=/time/Public/Admin/img/shadow_bg.jpg></td></tr></table>
        <table cellspacing=0 cellpadding=0 width="90%" align=center border=0>
            <tr height=100>
                <td align=middle width=100><img height=100 src="/time/Public/Admin/img/admin_p.gif" 
                                                width=90></td>
                <td width=60>&nbsp;</td>
                <td>
                    <table height=100 cellspacing=0 cellpadding=0 width="100%" border=0>

                        <tr>
                           <text> 当前时间<text><td id="timenow"></td></tr>
							
							<script>
							//var div = document.getElementById('timenow');
                              //  div.innerHTML="当前时间"; 							
							setInterval("timenow.innerHTML=new Date().toLocaleString()+'<text>星期</text>'+'日一二三四五六'.charAt(new Date().getDay());",1000);
							</script>
                        <tr>
                            <td ><text><?php echo (session('admin_username')); ?></text></td></tr>
                        <tr>
                            <td><text>欢迎进入网站管理中心！</text></td></tr></table></td></tr>
            <tr>
                <td colspan=3 height=10></td></tr></table>
        <table cellspacing=0 cellpadding=0 width="95%" align=center border=0>
            <tr height=20>
                <td></td></tr>
            <tr height=22>
                <td style="padding-left: 20px; font-weight: bold; color: #ffffff" 
                    align=middle background=/time/Public/Admin/img/title_bg2.jpg>您的相关信息</td></tr>
            <tr bgcolor=#ecf4fc height=12>
                <td></td></tr>
            <tr height=20>
                <td></td></tr></table>
        <table cellspacing=0 cellpadding=2 width="95%" align=center border=0>
            <tr>
                <td align=right width=100><text>登陆帐号：</text></td>
                <td style="color: #880000"><?php echo (session('admin_username')); ?></td></tr>
            <tr>
            <tr>
                <td align=right width=100><text>真实姓名：</text></td>
                <td style="color: #880000"><?php if($real_name){echo $real_name;}else {echo "空";}?></td></tr>
            <tr>
                <td align=right><text>登陆次数：</text></td>
                <td style="color: #880000"><?php echo ($flag); ?></td></tr>
            <tr>
                <td align=right><text>上线时间：</text></td>
                <td style="color: #880000"><?php echo ($logtime); ?></td></tr>
            <tr>
                <td align=right><text>ip地址：</text></td>
                <td style="color: #880000"><?php echo ($ip); ?></td></tr>
            <tr>
                <td align=right><text>网站开发qq：</text></td>
                <td style="color: #880000">2508635478||1103009779</td></tr>
            <tr>
                <td align=right><text>新浪微博：</text></td>
                <td style="color: #880000"><a  target="_blank" href="http://weibo.com/5723549463/profile?rightmod=1&wvr=6&mod=personinfo">心安勿宇Love王</a></td>
            </tr>
        </table>
		<style>
		  .showInfo{
		   width:650px;
		   height:50px;
		 
		   margin-left:250px;
		   face:华文行楷;
		   font-size:10px;
		  }
		  a:hover{
		    text-decoration:none;
		  }
		</style>
        <div class="showInfo"><text> Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://green.njtech.edu.cn/"><font face=华文行楷 size='3px'>南京工业大学绿荫工作室</font></a></text></div>
    </body>
</html>