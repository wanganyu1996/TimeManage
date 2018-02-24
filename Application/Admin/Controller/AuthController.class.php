<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller {
    //获取权限信息
    public function showlist(){
        $info=$this->getInfo();
        $this->assign('info',$info);
        $this->display();
      }
      public function add(){
          $info=$this->getInfo(true);
          $this->assign('info',$info);
          if(IS_POST){
            $model=D('Auth');
           if($model->create()){
               $new_id=$model->add();
               if($_POST['auth_pid']==0){
                  $auht_path=$new_id;
               }else{
                       $pinfo=$model->find($_POST['auth_pid']);
                       $auth_path=$pinfo['auth_id'].'-'.$new_id;
                   }
                   $auth_level=count(explode('-',$auth_path))-1;
                   $rst=$model->save(array(
                       'auth_id'=>$new_id,
                       'auth_path'=>$auth_path,
                       'auth_level'=>$auth_level
                   ));
                   if($rst!==FALSE){
                        $this->success("权限添加成功！");
                        exit;
                   }else{
                       $this->error("权限添加失败！");
                       exit;
                   }
               }
               else
                    $this->error("添加失败！");
           }
           $this->display();
        }
        //获取权限信息 默认参数为false 查询权限列表所有数据 
      function getInfo($flag=false){
          $model=D('Auth');
          $model->select();
          if($flag==true){
              //查询权限 auth_level 为 0,1的权限
              $info=$model->where('auth_level < 2')->select();
          }else{
              $info=$model->order('auth_path asc')->select();
          }
          //将权限信息拼成-->形式  例如：系统管理   -->管理员管理 -->-->添加管理员
          foreach($info as $k=> $v){
              $info[$k]['auth_name']=str_repeat('-->',$v['auth_level']).$info[$k]['auth_name'];
          }
          return $info;
      }
}




















