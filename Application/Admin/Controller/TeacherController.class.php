<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class TeacherController extends Controller {
    function distribute(){
        $m=M('Manager');
        $info=$m->where('ad_role_id=2')->select();
        $this->assign('info',$info);
        $this->display();
    }
    function disclass(){
        
        $m=M("Manager");
        $id=I("get.id");
        $info=$m->where("id=".$id)->find();
        if(I("get.nj")){
            $data['nj']=I("get.nj");
            $rst=$m->where("id=".$id)->save(array(
                'nj'=>$data['nj']
            ));
            if($rst!==FALSE){
                 $this->success("分配班级成功！",U("Teacher/distribute"));
                 exit;
            }else{
                $this->error("对不起，分配班级失败！");
                exit;
            }
        }
       // dump($info);
        $this->assign('info',$info);
        $this->display();
    }
    public function showtime(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        $teacher=$data['real_name'];
        $model=M('stubase');
        $total=$model->where("teacher='".$teacher."'")->count();
        $per=15;
        $page=new \Component\Page($total,$per);
        $pagelist=$page->fpage();
        $info=$model->where("teacher='".$teacher."'")->order('stuid')->limit($page->limit)->select();
        $this->assign('info',$info);
        $this->assign('pagelist',$pagelist);
        $this->display();
    }
 public function showchart(){
         $m=M("Manager");
         $id=$_SESSION['admin_id'];
         $data=$m->where(array('id'=>array('eq',$id)))->find();
         $where['teacher']=array('eq',$data['real_name']);
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
              $orderby=id;
          }
          $orderway=I("get.sort");
          if(empty($orderway)){
              $orderway=asc;
          }
          $m=M("stuitem");
          $total=$m->where($where)->count();
           //$per=$total;
         $per=10;
          $page=new \Component\Page($total,$per);
          $pagelist=$page->fpage();
          $info=$m->where($where)->order("$orderby $orderway")->limit($page->limit)->select();
          $info1=$m->where($where)->select();
          //dump($info1);
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
    public function outputall(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        $where['teacher']=array('eq',$data['real_name']);
        $where['year']=I("get.year");//学年
        $where['term']=I("get.term");//学期
        $m=M("stuitem");
        $result=$m->field("stuid,stuclass,stuname,ktxx,kwjz,zwzx,rjjw,tydl,kjcx,swyx,nwws,sthd,week,xq,term,year,today")->where($where)->select();
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
            $this->error("对不起你要查询的数据不存在，请重新选择导出条件");
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
    public function showscore(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        $where['teacher']=array('eq',$data['real_name']);
        $model=M('stubase');
        $total=$model->where($where)->count();
        $per=15;
        $page=new \Component\Page($total,$per);
        $pagelist=$page->fpage();
        $info=$model->where($where)->order('stuid')->limit($page->limit)->select();
        $this->assign('info',$info);
        $this->assign('pagelist',$pagelist);
        $this->display();
    }
  public function notfilltime(){
      $m=M("Manager");
      $id=$_SESSION['admin_id'];
      $data1=$m->where(array('id'=>array('eq',$id)))->find();
      $teacher=$data1['real_name'];
      $stubase=M("stubase");
      $t=M("stuitem");
      $starttime=I("get.starttime");
      if(empty($starttime)){
          $starttime=date("Y-m-d");
      }
      $counts=$stubase->where("teacher='".$teacher."'")->count();
      $c=$stubase->where("teacher='".$teacher."'")->select();
      $where['today']=$starttime;
      for($j=0;$j<$counts;$j++){
          $where['stuid']=$c[$j]['stuid'];
          $rst=$t->where($where)->find();
          //$rst=$t->query("select * from tp_stuitem where stuid='".$c[$j]['stuid']."'"." and today='".$starttime."'");
          if(empty($rst)){
              //  dump("未填报");
              $data[$j]['stuid']=$c[$j]['stuid'];
              $data[$j]['stuname']=$c[$j]['stuname'];
              $data[$j]['stuclass']=$c[$j]['stuclass'];
              $data[$j]['today']=$starttime;
          }
      }
      $this->assign("data",$data);
      $this->display();
  }
  public function downfile($file_name){
      $file_name=I('get.file_name');
      $file_path=__ROOT__.'/Public/File/';
      down_file($file_name,$file_path);
      return ;
  }
}




















