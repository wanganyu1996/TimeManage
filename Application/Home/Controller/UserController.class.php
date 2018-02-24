<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
       // $model=D('User');
        $log=M('loginfo');
        if(IS_POST){
            $model=M('stubase');
            $stuid=I("post.stuid");
            $pwd=I("post.password");;
            $user=$model->where('stuid='.$stuid)->find();
            if($user){
               /* if(md5($pwd.C('MD5_KEY'))==$user['password']&&$user['flag']==0){
                    //这里要不要封装到函数里,答：不用
                    session('stuid',$stuid);
                    session('stuname',$user['stuname']);
                   
                    $data['stuid']=$stuid;
                    $data['stuname']=$user['stuname'];
                    $data['stuclass']=$user['stuclass'];
                    $data['logtime']=date('Y-m-d H:i:s');
                    $log->add($data);
                    $d['info']="第一次登录，请修改密码！";
                    $d['url']=U('editpwd?stuid='.$stuid);
                    $this->ajaxReturn($d);
                    exit;
                }*/
                if($user['password']==md5($pwd.C('MD5_KEY'))){
                    session('stuid',$stuid);
                    session('stuname',$user['stuname']);
                    $data['stuid']=$stuid;
                    $data['stuname']=$user['stuname'];
                    $data['nj']=$user['nj'];
                    $data['teacher']=$user['teacher'];
                    $data['stuclass']=$user['stuclass'];
                    $data['logtime']=date('Y-m-d H:i:s');
                    
                    $log->add($data);
                    $d['info']="登录成功！";
					 $MCount = M('count');
					 $count = $MCount->where('id=0')->find();
					 ++$count['num'];
					 $res = $MCount->where('id=0')->save($count);
                    $d['url']=U('Index/index');
                    $this->ajaxReturn($d);
                }else{
                    $d['info']="密码错误！";
                    $d['url']="";
                    $this->ajaxReturn($d);
                    exit;
                }
            }else{
                $d['info']="账号不存在！";
                $d['url']="";
                $this->ajaxReturn($d);
                exit;
            }
       }
      $this->display();
    }
    public function editpwd(){
        if(IS_POST)
        {
            $model = M('stubase');
            $stuid=I('post.stuid');
            $data['flag']=1;
            $data['stuid']=I('post.stuid');
            $data['password']=md5(I('post.password').C('MD5_KEY'));
            $rst=$model->where('stuid='.$stuid)->save($data);
            if($rst!==FALSE)
            {
                $d['info']="密码修改成功!";
                $this->ajaxReturn($d);
                $this->redirect(U('login'));
                exit;
            }
            $d['info']="密码修改失败!";
            $this->ajaxReturn($d);
        }
        $this->display();
    }
    public function code(){
        $config=array(
            'fontSize'=>18,
            'length'=>4,
            'imageH'=>'35px',
        );
        $verify=new \Think\Verify($config);
        $verify->entry();
    }
}
