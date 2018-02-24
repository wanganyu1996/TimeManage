<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
class TimeController extends IndexController {
    public function timemanager(){
        $this->display();
    }
    public function timemanage(){
        
        $nowtime=time();//当前时间距离格林威治的标准时间戳
        $tm=M("termtime");
        $info=$tm->select();
        $ftime=strtotime($info[0]['starttime']);//第一学期开学时间
        $etime=strtotime($info[0]['endtime'])+86400;//第一学期结束时间
        $dftime=strtotime($info[1]['starttime']);//第二学期开学时间
        $detime=strtotime($info[1]['endtime'])+86400;//第二学期结束时间
        if($nowtime<$ftime){
            // $this->error("未在开学的时间段内，时间填报无效！");
             //die();

            $data['info']="未在开学的时间段内，时间填报无效！";
            $this->ajaxReturn($data);
            exit;
        }
        if($nowtime>=$ftime&&$nowtime<=$etime){
            $data['year']=$info[0]['years'];
            $data['term']=$info[0]['term'];
            $totime=$nowtime-$ftime;
            $t=ceil(($nowtime-$ftime)/86400);//当前时间与开学时间的时间戳
            $data['week']=ceil($t/7);
            //echo "当前第".$w."周";
        }
        if($nowtime>$etime&&$nowtime<$dftime){
           // $this->error("未在开学的时间段内，时间填报无效！");
          //  die();
            
            $data['info']="未在开学的时间段内，时间填报无效！";
            $this->ajaxReturn($data);
            exit;
        }
        if($nowtime>=$dftime&&$nowtime<=$detime){
            $data['year']=$info[1]['years'];
            $data['term']=$info[1]['term'];
            $totime=$nowtime-$dftime;
            $t=ceil(($nowtime-$dftime)/86400);
            $data['week']=ceil($t/7);
        }
        $model=M('stuitem');
        $data['today']=date('Y-m-d');//当前的时间
        $data['stuid']=$_SESSION['stuid'];
        $data['nj']=substr($_SESSION['stuid'],4,2);
        $m=M('stubase');
        $class=$m->where("stuid=".$data['stuid'])->find();
        $data['stuclass']=$class['stuclass'];
        $data['stuname']=$class['stuname'];
        $sql="select * from tp_stuitem where stuid='".$data['stuid']."'and today='".$data['today']."' ";
        $ss=$model->query($sql);
         if(!empty($ss)){
             $data['info']="今天时间已经填报";
             $this->ajaxReturn($data);
              exit;
         }
        $str=I('post.items');
        $items=explode(',', $str);
        $data['ktxx']=$items[0];
        $data['kwjz']=$items[1];
        $data['zwzx']=$items[2];
        $data['rjjw']=$items[3];
        $data['tydl']=$items[4];
        $data['kjcx']=$items[5];
        $data['swyx']=$items[6];
        $data['nwws']=$items[7];
        $data['sthd']=$items[8];
        //$data['year']=I('post.schoolyears');//学年
        //$data['term']=I('post.terms');//学期
       // $week=I('post.weeks');
		//$data['week']=$week;//周次
        $data['teacher']= $class['teacher'];
        $data['xq']=date('w');
         if(date('w')==0){
             $data['xq']=7;
         }else{
             $data['xq']=date('w');
         }
        $data['today']=date('Y-m-d');
        $rst=$model->add($data);
        $yes['info']="填报成功！";
       // $no['info']= $items;
        $no['info']="填报失败!";
        if($rst){
            $this->ajaxReturn($yes);
            exit;
        }else{
            $this->ajaxReturn($no);
            exit;
        }
    }
    public function timetrace(){
        $stuid=$_SESSION['stuid'];
        if($stuid){
            $where['stuid']=array('eq',$stuid);
         if(IS_GET){
            $year=I('get.year');
          if($year){
              $where['year']=array('eq',$year);
          }
          $term=I('get.term');
          if($term){
              $where['term']=array('eq',$term);
          }
          $weeks=I('get.weeks');
          if($weeks){
              $where['week']=array('eq',$weeks);
          }
          if($_GET){
            $model=M('stuitem');
            $info=$model->where($where)->order("xq asc")->limit(7)->select();
            $this->assign('info',$info);
          }
         }
        }
        $this->display();        
    }
}