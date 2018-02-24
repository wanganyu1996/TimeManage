<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>南京工业大学电气工程与控制科学学院时间管理网站后台用户登录</title>

        <link href="/time/Public/Admin/css/User_Login.css" type="text/css" rel="stylesheet" />
		<style>
		  wordStyle{
		   color:#005AB5;
		   face:华文行楷;
		   font-weight:bold;
		  }
		</style>
    </head><body id="userlogin_body">
        <div></div>
        <div id="user_login">
            <dl>
                <dd id="user_top">
                    <ul>
                        <li class="user_top_l"></li>
                        <li class="user_top_c"></li>
                        <li class="user_top_r"></li></ul>
                </dd><dd id="user_main">
                    <form action="/time/index.php/Admin/Manager/login.html" method="post">
                        <ul>
                            <li class="user_main_l"></li>
                            <li class="user_main_c">
                                <div class="user_main_box">
                                    <ul>
                                        <li class="user_main_text"><wordStyle>用户名：</wordStyle> </li>
                                        <li class="user_main_input">
                                            <input class="TxtUserNameCssClass" id="admin_user" maxlength="20" name="ad_username"> </li></ul>
                                    <ul>
                                        <li class="user_main_text"><wordStyle>密&nbsp;&nbsp;&nbsp;&nbsp;码： </wordStyle></li>
                                        <li class="user_main_input">
                                            <input class="TxtPasswordCssClass" id="admin_psd" name="ad_password" type="password">
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="user_main_text"><wordStyle>验证码：</wordStyle> </li>
                                        <li class="user_main_input">
                                            <input class="TxtValidateCodeCssClass" id="captcha" name="code" type="text">
                                           </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="<?php echo U('Verifyimg');?>" onclick="this.src=this.src+'?'+Math.random()"  alt="" />
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user_main_r">

                                <input style="border: medium none; background: url('/time/Public/Admin/img/user_botton.gif') repeat-x scroll left top transparent; height: 122px; width: 111px; display: block; cursor: pointer;" value="" type="submit">
                            </li>
                        </ul>
                    </form>
                </dd><dd id="user_bottom">
                    <ul>
                        <li class="user_bottom_l"></li>
                        <li class="user_bottom_c"><span style="margin-top: 40px;"></span> </li>
                        <li class="user_bottom_r"></li></ul></dd></dl></div><span id="ValrUserName" style="display: none; color: red;"></span><span id="ValrPassword" style="display: none; color: red;"></span><span id="ValrValidateCode" style="display: none; color: red;"></span>
        <div id="ValidationSummary1" style="display: none; color: red;"></div>
    </body>
</html>