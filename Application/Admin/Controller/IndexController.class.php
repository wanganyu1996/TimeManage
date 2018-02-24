<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $ip1 =gethostbyname($url);        // 按域名获取IP
         $this->display();
       }
    public function head(){
        $this->display();
    }
    //左边导航条的显示
    public function left(){
        $sql="select * from tp_manager where id=".$_SESSION['admin_id'];
        $minfo=D()->query($sql);
        $sql="select * from tp_role where role_id=".$minfo[0]['ad_role_id'];
        $rinfo=D()->query($sql);
        $auth_ids=$rinfo[0]['role_auth_ids'];
        //获取顶级权限
        $sql="select * from  tp_auth where auth_level=0 ";
        if($_SESSION['admin_id']!=1){
            $sql.=" and auth_id in ($auth_ids)";
        }
        $p_info=D()->query($sql);
        $sql="select * from tp_auth where auth_level=1 ";
        if($_SESSION['admin_id']!=1){
            $sql.=" and auth_id in($auth_ids)";
        }
        $r_info=D()->query($sql);
        $this->assign('p_info',$p_info);//传递顶级权限
        $this->assign('r_info',$r_info);//传递次顶级权限
        //dump($p_info);
       //dump($r_info);
        $this->display();
    }
    public function right(){
        $model=M('manager');
        $where['id']=$_SESSION['admin_id'];
        $info=$model->where($where)->find();
        $this->assign('real_name',$info['real_name']);
        $this->assign('flag',$info['flag']);
        $this->assign('logtime',$info['logtime']);
        $ip =gethostbyname();
        $this->assign('ip',$ip);
        $this->display();
    }
}