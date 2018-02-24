<?php
namespace Admin\Controller;
use \Think\Controller;
class RoleController extends Controller{
    function showlist(){
          $model=D('Role');
          $rinfo=$model->select();
           $this->assign('rinfo',$rinfo);
           
          $this->display();
    }
    function addrole(){
        $pinfo=D('Auth')->where('auth_level=0')->select();
        $qinfo=D('Auth')->where('auth_level=1')->select();
        $rinfo=D('Auth')->where('auth_level=2')->select();
        if(IS_POST){
            $role_name=I("post.role_name");
            $auth_ids=I("post.role_auth_ids");
            $role_auth_ids=implode(",", $auth_ids);
            if($role_auth_ids){
               $info=M('Auth')->select($role_auth_ids);
            }
            foreach($info as $k=>$v)
            {
                
                if(!empty($v['auth_module'])&&!empty($v['auth_action'])){
                    $role_auth_ac.=$v['auth_module']."-".$v['auth_action'].",";
                }
               }
               $role_auth_ac=rtrim($role_auth_ac,",");
              // dump($role_auth_ac);
              // dump($role_name);
            //   dump($role_auth_ids);
            //}
        $rst=D("Role")->add(
             array(
                 'role_name'=>$role_name,
                 'role_auth_ac'=>$role_auth_ac,
                 'role_auth_ids'=>$role_auth_ids
             )
            );
        if($rst){
            $this->success("角色添加成功！",U('Role/showlist'));
            exit;
        }else{
            $this->error("角色添加失败！");
            exit;
        }
      }
         $this->assign('pinfo',$pinfo);
         $this->assign('qinfo',$qinfo);
         $this->assign('rinfo',$rinfo);
         $this->display();
    }
    function distribute($id){
        
        if(IS_POST){
            $role_auth_ids=implode($_POST['auth_name'],',');
            $info=D('Auth')->select($role_auth_ids);
           foreach($info as $k=>$v){
               if(!empty($v['auth_module'])&&!empty($v['auth_action'])){
                    $role_auth_ac.=$v['auth_module'].'-'.$v['auth_action'].',';
               }
           }
            $role_auth_ac=rtrim($role_auth_ac,',');                    
            $rst=D('Role')->save(
                 array('role_id'=>$id,
                     'role_auth_ac'=>$role_auth_ac,
                     'role_auth_ids'=>$role_auth_ids
                 )
                );
            if($rst!==FALSE){
                $this->success("分配权限成功！",U('Role/showlist'));
                exit;
            }else{
                $this->error("分配权限失败！");
            }
            
        }
        $role_id=I('get.id');
        $info=D('Role')->getByRole_id($role_id);
        $pinfo=D('Auth')->where('auth_level=0')->select();
        $qinfo=D('Auth')->where('auth_level=1')->select();
        $rinfo=D('Auth')->where('auth_level=2')->select();
        $auth_ids=explode(',',$info['role_auth_ids']);
      // dump( $info['role_auth_ids']);
     // exit;
        $this->assign('info',$info);
        $this->assign('auth_ids',$auth_ids);
        $this->assign('pinfo',$pinfo);
        $this->assign('qinfo',$qinfo);
        $this->assign('rinfo',$rinfo);
        $this->display();
    }
    
}
