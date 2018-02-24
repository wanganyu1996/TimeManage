<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class SettingsController extends Controller {
    public function showlist(){
        $info=$this->getInfo();
        $this->assign('info',$info);
        $this->display();
      }
     public function setterm(){
         if(IS_POST){
             //dump($_POST);
             //die();
             $model=M('termtime');
             $data['years']=I("post.years");
             $data['term']=1;
             $data['starttime']=I("post.starttime");
             $data['endtime']=I("post.endtime"); //这里曾经出了一个错误
             $data2['years']=I("post.years");
             $data2['term']=2;
             $data2['starttime']=I("post.starttime2");
             $data2['endtime']=I("post.endtime2");
			 
			   $rst=$model->where("id=0")->save($data);  
               $rst1=$model->where("id=1")->save($data2);
                 if($rst!==FALSE&&$rst1!==FALSE){
                     $this->success("学期开学时间设置成功！");
                     exit;
                 }else{
                     $this->error("学期时间设置失败！");
                     exit;
                 }
         }
         $this->display();
     }
  
    
}




















