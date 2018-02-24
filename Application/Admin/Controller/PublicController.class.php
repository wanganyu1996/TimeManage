<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    //获取权限信息
    public function _initialize(){
        //string 'Time-showlist,Student-loginfo,Time-outputtime,Score-showlist,Time-notfilltime' (length=77)
       //控制器名------方法名
        $now_ac=CONTROLLER_NAME.'-'.ACTION_NAME;
        //$_SESSION['admin_id']=$_SESSION['admin_id'];
        $sql="select * from tp_manager a  join  tp_role  b where a.ad_role_id=b.role_id and a.id=".$_SESSION['admin_id'];
        $info=D()->query($sql);
        $auth_ac=$info[0]['role_auth_ac'];
        $allow_ac=array('Index-left','Index-right','Index-head','Index-index','Manager-login');
        $rinfo=D('Manager')->where(array('id'=>$_SESSION['admin_id']))->find();
        if($rinfo['ad_role_id']==3){
            //exit;
        }else{
            if(!in_array($now_ac,$allow_ac) && $_SESSION['admin_id']!=1 && strpos($auth_ac,$now_ac)===FALSE){
                  $this->error('无权访问！',U('Manager/login'));
            }
        }
       
    }
}




















