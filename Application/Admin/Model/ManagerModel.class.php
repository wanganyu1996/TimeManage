<?php
namespace Admin\Model;
use Think\Model;
 class ManagerModel extends Model{
        protected  $_validate=array(
             array('ad_username','require','用户名不能为空！',1),
            array('ad_password','require','密码不能为空！',1),
            array('code','require','验证码不能为空！',1),
            array('code','checkCode','验证码填写不正确',1,'callback'),
        );
        function checkCode($code){
             $Verify=new \Think\Verify();  
             return $Verify->check($code);
        }
        function login(){
            $username=trim(I("post.ad_username"));
            $password=trim(I("post.ad_password"));
           // $password=$this->ad_password;
            $admin=$this->where(array(
                'ad_username'=>array('eq',$username),
            ))->find();
            if($admin){
                if($admin['id']==1||$admin['is_use']==1){
                    if($admin['ad_password']==md5($password.C('MD5_KEY'))){
                         session('admin_id',$admin['id']);
                         session('admin_username',$admin['ad_username']);
                          $admin['flag']++;
                         $this->where(array(
                            'ad_username'=>array('eq',$username),
                          ))->save(array(
                             'flag'=>$admin['flag'],
                             'logtime'=>date("Y-m-d H:i:s"),
                         ));
                        return TRUE;
                    }else{
                        $this->error="用户名或者密码错误！";
                        return FLSASE;
                    }
                }else{
                    $this->error="用户名被禁用！";
                    return FLSASE;
                }
            }else{
                $this->error="用户名不存在！";
                return FLSASE;
            }
        }
 }