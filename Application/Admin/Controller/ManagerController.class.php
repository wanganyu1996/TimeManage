<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller {
   function showlist(){
       $info=D('Manager')->select();
       $rinfo=$this->getRoleInfo();
       $this->assign('rinfo',$rinfo);
       $this->assign('info',$info);
       $this->display();
   }
   function upd($id){
       if(IS_POST){
           $password=I("post.ad_password");
           if(!empty($password)){
               $data['ad_password']=md5($password.C('MD5_KEY'));
           }
           $data['ad_username']=I("post.ad_username");
           $data['ad_role_id']=I("post.ad_role_id");
           $data['real_name']=I("post.real_name");
           $model=M('Manager');
           $rst=$model->where("id=".$id)->save($data);
           if($rst!==FALSE){
              $this->success("管理员信息修改成功！",U('showlist'));
              exit;
           }else{
               $this->error("分配角色修改失败！");
               exit;
            }
           }
       $rinfo=$this->getRoleInfo();
       $info=D('Manager')->find($id);
       $this->assign('info',$info);
       $this->assign('rinfo',$rinfo);
      $this->display();
   }
    public function login(){
        if(IS_POST){
            $model=D('Manager');
            if($model->create()){
              if($model->login()===TRUE){
                  redirect(U('Index/index'));
                   exit;
           }else{
                $this->error($model->getError());
           }
        }else{
            $this->error($model->getError());
        }
        }
        $this->display();
    }
    public function dologout(){
        session(null);
        $this->redirect('Manager/login');
    }
      function Verifyimg(){
       $Verify= new \Think\Verify(array(
           'fontSize'    => 18,    // 验证码字体大小
           'length' => 4,
           'useNoise' => false,
          'imageW'=>'123px',
           'imageH'=>'40px',
           'useCurve'=>false,
       ));
       $Verify->codeSet = '0123456789';
       $Verify->entry();
   }
   function getRoleInfo(){
     $model=D('Role'); 
     $rinfo=$model->select();      
        $info=array();
       foreach($rinfo as $k=>$v){
           $info[$v['role_id']]=$v['role_name'];
       }
       return $info;
   }
   public function addmanager(){
       $r=M(role);
       $info=$r->select();
       $this->assign("info",$info);
       if(IS_POST){
           $m=M("manager");
           $data['ad_username']=I("post.ad_username");
           $data['real_name']=I("post.real_name");
           $data['ad_password']=md5(I("post.ad_password").C('MD5_KEY'));
           $data['ad_role_id']=I("post.ad_role_id");
           //$data['is_use']=I("post.is_use");
           $rst=$m->add($data);
           if($rst){
               $this->success("添加管理员成功！",U("Manager/showlist")); 
               exit;  
            }else{
               $this->error("添加管理员失败！");
               exit;
           }
       }
      $this->display();
   }
   public function delete(){
          $id=I("get.id");
          $m=M("manager"); 
          if($id==1){
              $this->error("超级管理员无法删除！");
          } 
          $rst=$m->where("id=".$id)->delete();
          if($rst!=FASLE){
              $this->success("删除成功！");
          }else{
              $this->error("删除失败");
          }        
   }
}




















