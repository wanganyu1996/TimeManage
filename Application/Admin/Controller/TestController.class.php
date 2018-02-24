<?php
namespace Admin\Controller;
use Think\Controller;
class TestController extends Controller
{
    public function test(){
        $nowtime=time();//当前时间距离格林威治的标准时间戳
        $model=M("termtime");
        $info=$model->select();
        $ftime=strtotime($info[0]['starttime']);//第一学期开学时间
        $etime=strtotime($info[0]['endtime'])+86400;//第一学期结束时间
        $dftime=strtotime($info[1]['starttime']);//第二学期开学时间
        $detime=strtotime($info[1]['endtime'])+86400;//第二学期结束时间
      if($nowtime>=$ftime&&$nowtime<=$etime){
            $data['year']=$info[0]['years'];
            $data['term']=$info[0]['term'];
            $totime=$nowtime-$ftime;
            $t=ceil(($nowtime-$ftime)/86400);//当前时间与开学时间的时间戳
            $data['week']=ceil($t/7);
           echo "当前第". $data['week']."周";
        }
        if($nowtime>$etime&&$nowtime<$dftime){
            echo "未在开学的时间段内，时间填报无效！";
           exit;
        }
        if($nowtime>=$dftime&&$nowtime<=$detime){
            $data['year']=$info[1]['years'];
            $data['term']=$info[1]['term'];
            $totime=$nowtime-$dftime;
            $t=ceil(($nowtime-$dftime)/86400);
            $data['week']=ceil($t/7);
            echo "当前第". $data['week']."周";
        }else{
            echo "未在开学的时间段内，时间填报无效！";
            exit;
        }
    }
    public function index(){
        $f1=strtotime("2016-08-29 00:00:00");
       // echo $f1."   ".strtotime("2016-08-30")."-------";
        $f2=strtotime("2017-01-13 9:48:59");
        //$day=24*3600;
        $t=ceil(($f2-$f1)/86400);
        echo $t."<br/>";
        $w=ceil($t/7);
        echo $w;
    }
}

?>