<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function __construct(){
        $stuid=session('stuid');
        if(!$stuid){
            redirect(U('User/login'));
        }
        parent::__construct();
    }
    public function index(){
        $stuid=$_SESSION['stuid'];
        $info=M('teastu')->where('stu_id='.$stuid)->find();
        $teacher=M('teacher')->where('teaid='.$info['tea_id'])->find();
        $class=M('stubase')->where('stuid='.$stuid)->find();
		$count=M('count')->where('id=0')->find();
		session('Num',$count['num']);
        $this->assign('class',$class['stuclass']);
        $this->assign('teaname',$class['teacher']);
        $this->display();
    }
    public function dologout(){
        session(null);
        $this->redirect('User/login');
    }
    
}