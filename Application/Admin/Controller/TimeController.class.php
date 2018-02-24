<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class TimeController extends Controller {
   
    public function showlist(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        if($data['ad_role_id']==2){
            $where['nj']=$data['nj'];
        }
        if($data['ad_role_id']==3){//导师
           $this->redirect("Teacher/showtime");
        }  
            $model=M('classes');
           $total=$model->where($where)->count();
           $per=8;
           $page=new \Component\Page($total,$per);
           $pagelist=$page->fpage();
           $info=$model->where($where)->order('id')->limit($page->limit)->select();
           $this->assign('info',$info);
           $this->assign('pagelist',$pagelist);
           $this->display();
    }
    public function showtime(){
       $class=I('get.class');
       $model=M('stubase');
       $total=$model->where("stuclass='".$class."'")->count();
       $per=12;
       $page=new \Component\Page($total,$per);
       $pagelist=$page->fpage();
       $info=$model->where("stuclass='".$class."'")->order('stuid')->limit($page->limit)->select();
       $this->assign('info',$info);
       $this->assign('pagelist',$pagelist);
       $this->display();
    }
    public  function showonetime(){
       // dump($_GET);
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        if($data['ad_role_id']==2){
            $where['nj']=$data['nj'];
        }
      
         $stubase=M('stubase');         
         $stuid=I('get.stuid');
         if(!empty($stuid)){
             $where['stuid']=array('eq',$stuid);
         }
         $stuname=I('get.stuname');
        
         if(!empty($stuname)){
            $where['stuname']=array('eq',$stuname);
            $this->assign('stuname',$stuname);
         }
         $stu=$stubase->where($where)->find();
         if(empty($stu)&&!empty($where['nj'])){
             $this->error("您无权限查询此学生信息！");
         }
         if(empty($stu)){
             $this->error("您要查询的学生信息不存在！");
         }
         $this->assign('stuName',$stu['stuname']);
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
          $starttime=I('get.starttime');
          if($starttime){
              unset($where);
           if(!empty($stuid)){
                     $where['stuid']=array('eq',$stuid);
              }
              if(!empty($stuname)){
                  $where['stuname']=array('eq',$stuname);
              }
              $where['today']=array('egt',$starttime);
          }
          $endtime=I('get.endtime');
          if($endtime){
              unset($where);
              if(!empty($stuid)){
                     $where['stuid']=array('eq',$stuid);
              }
              if(!empty($stuname)){
                  $where['stuname']=array('eq',$stuname);
              }
             $where['today']=array('elt',$endtime);              
          }
          if($starttime&&$endtime){
              unset($where);
              if(!empty($stuid)){
                     $where['stuid']=array('eq',$stuid);
              }
              if(!empty($stuname)){
                  $where['stuname']=array('eq',$stuname);
              }
              $where['today']=array('between',array($starttime,$endtime));
          }
          $model=M('stuitem');
          $total=$model->where($where)->count();
          $per=5;
          $page=new \Component\Page($total,$per);
          $pagelist=$page->fpage();
          $info=$model->where($where)->limit($page->limit)->select();
          $info1=$model->where($where)->select();
          foreach($info1 as $k=>$v){
              $num[0]+=$info1[$k]['ktxx'];
              $num[1]+=$info1[$k]['kwjz'];
              $num[2]+=$info1[$k]['zwzx'];
              $num[3]+=$info1[$k]['rjjw'];
              $num[4]+=$info1[$k]['tydl'];
              $num[5]+=$info1[$k]['kjcx'];
              $num[6]+=$info1[$k]['swyx'];
              $num[7]+=$info1[$k]['nwws'];
              $num[8]+=$info1[$k]['sthd'];
          }
          $str='"'.$num[0].",".$num[1].",".$num[2].",".$num[3].",".$num[4].",".$num[5].",".$num[6].",".$num[7].",".$num[8].'"';
          $this->assign('str',$str);
          $this->assign('pagelist', $pagelist);
          $this->assign('info',$info);
          $this->display();
    }

    public function showchart(){
        $where['stuclass']=I("get.class");
        $starttime=I("get.starttime");
          if($starttime){
              $where['today']=array('egt',$starttime);
          }
          $endtime=I("get.endtime");
          if($endtime){
              $where['today']=array("elt",$endtime);
          }
          if($starttime&&$endtime){
              $where['today']=array("between",array($starttime,$endtime));
          }
          $orderby=I("get.items");
          if(empty($orderby)){
              $orderby=today;
          }
          $orderway=I("get.sort");
          if(empty($orderway)){
              $orderway=desc;
          }
          $m=M("stuitem");
          $total=$m->where($where)->count();
         $per=5;
          $page=new \Component\Page($total,$per);
          $pagelist=$page->fpage();
          $info=$m->where($where)->order("$orderby $orderway")->limit($page->limit)->select();
          $info1=$m->where($where)->select();
          foreach($info1 as $k=>$v){
               $num[0]+=$info1[$k]['ktxx'];
               $num[1]+=$info1[$k]['kwjz'];
               $num[2]+=$info1[$k]['zwzx'];
               $num[3]+=$info1[$k]['rjjw'];
               $num[4]+=$info1[$k]['tydl'];
               $num[5]+=$info1[$k]['kjcx'];
               $num[6]+=$info1[$k]['swyx'];
               $num[7]+=$info1[$k]['nwws'];
               $num[8]+=$info1[$k]['sthd'];
          }
          $str='"'.$num[0].",".$num[1].",".$num[2].",".$num[3].",".$num[4].",".$num[5].",".$num[6].",".$num[7].",".$num[8].'"';
          $this->assign('str',$str);
          $this->assign('info',$info);
          $this->assign('pagelist',$pagelist);
          $this->display();
    }
    public function  notfilltime(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data1=$m->where(array('id'=>array('eq',$id)))->find();
        if($data1['ad_role_id']==3){
            $this->redirect("Teacher/notfilltime");
        }
        if($data1['ad_role_id']==2){//辅导员
             $nj=$data1['nj'];
             $where['nj']=$nj;
        }
        $t1=M("termtime");
        $times=$t1->select();
         $m=M("stubase");
         $t=M("stuitem");
         $classes=M('classes')->where($where)->select();
         $this->assign("classes",$classes);
          $starttime=I("get.starttime");
          if(empty($starttime)){
              $starttime=date("Y-m-d");
          }
         $cla=I("get.classes");
         $where['stuclass']=$cla;
          $counts=$m->where($where)->count();
          $c=$m->where($where)->select();
          $where['today']=$starttime;
        
          for($j=0;$j<$counts;$j++){
              $where['stuid']=$c[$j]['stuid'];
              $rst=$t->where($where)->find();
              if(empty($rst)){
                  $data[$j]['stuid']=$c[$j]['stuid'];
                  $data[$j]['stuname']=$c[$j]['stuname'];
                  $data[$j]['stuclass']=$c[$j]['stuclass'];
                  $data[$j]['today']=$starttime;
              }
          }
         $this->assign("data",$data);
         $this->display();
    }
    public function outputtime(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
       if($data['ad_role_id']==2){//辅导员
             $nj=$data['nj'];
             $where['nj']=$nj;
        }
        if($data['ad_role_id']==3){
            $this->redirect("Teacher/outputtime");
        }
        $stuclass=M("classes");
        $classes=$stuclass->where($where)->select();
       // dump($classes);
        $this->assign("classes",$classes);
        $this->display();
    }
    public function outputall(){
        $where['stuclass']=I("get.classes");
        $where['year']=I("get.year");//学年
        $where['term']=I("get.term");//学期
        $m=M("stuitem");
        $result=$m->field("stuid,stuclass,stuname,count(ktxx),count(kwjz),count(zwzx),count(rjjw),count(tydl),count(kjcx),count(swyx),count(nwws),count(sthd),term,year")->where($where)->group('stuid')->order("today asc")->select();
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        $filename=$where['stuclass']." ". $where['year']=I("get.year")."学年时间管理信息";
        $headArr=array("学号","班级","姓名","课堂学习","课外讲座","早晚自习","人际交往","体育锻炼","科技创新","上网游戏","内务卫生","社团活动","学期","学年");
        $this->getExcel($filename,$headArr,$result);
    }
    public function outputone(){
        
       $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
       if($data['ad_role_id']==2){//辅导员
             $nj=$data['nj'];
             $where['nj']=$nj;
        }
        $stuid=I("get.stuid");
        if($stuid){
            $where['stuid']=$stuid;
        }
        $stuname=I("get.stuname");
        if($stuname){
            $where['stuname']=$stuname;
        }
        $where['year']=I("get.year2");//学年
        $where['term']=I("get.term2");//学期
        $m=M("stuitem");
        $result=$m->field("stuid,stuclass,stuname,ktxx,kwjz,zwzx,rjjw,tydl,kjcx,swyx,nwws,sthd,week,xq,term,year,today")->order("today asc")->where($where)->select();
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        $filename=$where['stuclass']." ". $where['year']=I("get.year")."学年时间管理信息";
        $headArr=array("学号","班级","姓名","课堂学习","课外讲座","早晚自习","人际交往","体育锻炼","科技创新","上网游戏","内务卫生","社团活动","周次","星期","学期","学年","填报时间");
        $this->getExcel($filename,$headArr,$result);
    }
    private	function getExcel($fileName,$headArr,$data){
        //对数据进行检验
        if(empty($data) || !is_array($data)){
            $this->error("对不起,时间管理信息为空，请重新选择查询信息");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }
        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";
    
        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        	
        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }
    
        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }
    
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean() ;//加上这个函数可以清除缓冲区，防止出现乱码
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
    
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }
}

















