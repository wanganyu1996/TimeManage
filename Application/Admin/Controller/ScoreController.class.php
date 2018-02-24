<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class ScoreController extends Controller {
    public function showonescore(){
        $stuid=I('get.stuid');
        $nj=substr($stuid,4,2);
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        if($data['ad_role_id']==2){
            if($nj!=$data['nj']){
                $this->error("您没有查询此学生成绩的权限！");
            }
        }
        if($stuid){
            $where['stuid']=array('eq',$stuid);
        }
        $stuname=I('get.stuname');
        if($stuname)
            $where['stuname']=array('eq',$stuname);
        if(IS_GET){
            $year=I('get.year');
            if($year){
                $where['years']=array('eq',$year);
            }
            $term=I('get.term');
            if($term){
                $where['term']=array('eq',$term);
            }
            $model=M('score');
            $total=$model->where($where)->count();
            $per=15;
            $page=new \Component\Page($total,$per);
            $pagelist=$page->fpage();
            $info=$model->where($where)->limit($page->limit)->select();
            $this->assign('info',$info);
            $this->assign('pagelist',$pagelist);
        }
           $this->display();
    }
    public function showlist(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        if($data['ad_role_id']==3){
            $this->redirect("Teacher/showscore");
            exit;
        }
        if($data['ad_role_id']==2){//辅导员
            $where['nj']=$data['nj'];
        }
        $model=M('classes');
           $total=$model->count();
           $per=8;
           $page=new \Component\Page($total,$per);
           $pagelist=$page->fpage();
           $info=$model->where($where)->order('id')->limit($page->limit)->select();
           $this->assign('info',$info);
           $this->assign('pagelist',$pagelist);
            $this->display();
    }
    public function showscore(){
       $class=I('get.class');
       $model=M('stubase');
       $total=$model->where("stuclass='".$class."'")->count();
       $per=15;
       $page=new \Component\Page($total,$per);
       $pagelist=$page->fpage();
       $info=$model->where("stuclass='".$class."'")->order('stuid')->limit($page->limit)->select();
       $this->assign('info',$info);
       $this->assign('pagelist',$pagelist);
       $this->display();
    }
    public function inputscore(){
        if(IS_POST){
            $data['years']=I("post.years");
            $data['term']=I("post.term");
        if($_FILES){
            $config = array(   
                 'savePath'=> 'Uploads/', 
                 'exts'       => array('xls', 'xlsx','html'), 
                'rootPath'=> './Public/',
            );
                  $upload=new \Think\Upload($config);// 实例化上传类
                  $info=$upload->upload();
                  
                  if(!$info) {
                      // 上传错误提示错误信息  
                        $this->error($upload->getError());
                  }else{
                  $fileName=$info['file1']['savename'];
                  $suffix=substr($fileName,-4);//截取文件后缀名
		          import("Org.Util.PHPExcel");
		          $filename="./Public/Uploads/".date('Y-m-d')."/".$fileName."";//从数据库提取信息导入
		          $PHPExcel=new \PHPExcel();
        		if($suffix==".xls"){
        		   import("Org.Util.PHPExcel.Reader.Excel5");
        		   $PHPReader=new \PHPExcel_Reader_Excel5();
        		}else{
        		  //如果excel文件后缀名为.xlsx，导入这下类
        		  import("Org.Util.PHPExcel.Reader.Excel2007");
        		  $PHPReader=new \PHPExcel_Reader_Excel2007();
        		}
        		//载入文件
        		  $PHPExcel=$PHPReader->load($filename);
		          //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
		          $currentSheet=$PHPExcel->getSheet(0);
		          //获取总列数
		          $allColumn=$currentSheet->getHighestColumn();
		          //获取总行数
		          $allRow=$currentSheet->getHighestRow();
		          //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
		          for($currentRow=3;$currentRow<=$allRow;$currentRow++){
			        //从哪列开始，A表示第一列
    			       for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
        				     //数据坐标
        				    $address=$currentColumn.$currentRow;
        				    $flag=ord($currentColumn)-65;
        				    //读取到的数据，保存到数组$arr中
        				    $arr[$currentRow][$flag]=$currentSheet->getCell($address)->getValue();
    			        }
		          }
		      //以上是对excel表格里的数据进行提取，提取规范成数组的形式
			     $m=M('score');
			     $rows=ord($currentColumn)-65;
			     //dump($arr);
    			 for($i=4;$i<count($arr)+3;$i++){
    			     for($j=3;$j<$rows-1;$j++){
    			         //dump("学号：".$arr[$i][1]."姓名：". $arr[$i][2]."课程名".$arr[3][$j+1]."分数：".$arr[$i][$j+1]);
    			         $str=explode("/",$arr[3][$j+1]);
    			         $data["course_name"]=$str[0];
    			         $data["course_xxzt"]=$str[1];
    			         $data["course_xf"]=$str[2];
    			         $data["stuid"]=$arr[$i][1];
    			         $data['nj']=substr($arr[$i][1],4,2);
    			         $data["stuname"]=$arr[$i][2];
    			         $data["course_score"]=$arr[$i][$j+1];
    			         $rst=$m->add($data);
    			         if($rst==FALSE){
    			             $this->error("成绩导入失败！");
    			         }
    			     }
    			}
    			
            }
             $this->success("数据上传成功！");
             exit;
          }
        }
        $this->display();
    }
}