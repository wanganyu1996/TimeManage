<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class StudentController extends Controller {
    function resetpwd(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        if($data['ad_role_id']==2){//辅导员
            $where['nj']=$data['nj'];
        }
        $model=M('stubase');
        $stuname=I('get.stuname');
        $stuid=I('get.stuid');
        if($stuname){
        $where['stuname']=I('get.stuname');
        }
        if($stuid){
            $where['stuid']=I('get.stuid');
        }
        $total=$model->where($where)->count();
        $per=5;
        $page=new \Component\Page($total,$per);
        $pagelist=$page->fpage();
        $info=$model->where($where)->limit($page->limit)->select();
        $this->assign('pagelist',$pagelist);
        $this->assign('info',$info);
        $this->display();
    }
    function editpwd(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data1=$m->where(array('id'=>array('eq',$id)))->find();
        if($data1['ad_role_id']==2){//辅导员
            $where['nj']=$data1['nj'];
        }
        $model=M('stubase');
        $stuid=I('get.stuid');
        if($stuid){
            $info=$model->where("stuid=".$stuid)->find();
            $pwd=substr($info['idcard'],-6);
            $data['password']=md5($pwd.C('MD5_KEY'));
            $data['flag']=0;
            $rst=$model->where("stuid=".$stuid)->save($data);
            if($rst!==FALSE){
                $this->success("密码重置成功！");
            }else{
                $this->error("密码重置失败！");
            }
        }
    }
    function loginfo(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data=$m->where(array('id'=>array('eq',$id)))->find();
        if($data['ad_role_id']==2){//辅导员
            $where['nj']=$data['nj'];
        }
        if($data['ad_role_id']==3){//导师
            $where['teacher']=$data['real_name'];
        }
            $model=M('loginfo');
            $stuname=I('get.stuname');
             if($stuname){
                $where['stuname']=array('eq',$stuname);
             }
             $stuid=I('get.stuid');
             if($stuid){
                 $where['stuid']=array('eq',$stuid);
             } 
             if($stuname&&$stuid){
                 $where['stuname']=array('eq',$stuname);
                 $where['stuid']=array('eq',$stuid);
             }
             $total=$model->where($where)->count();
             $per=10;
            $page=new \Component\Page($total,$per);
            $pagelist=$page->fpage();
            $info=$model->where($where)->order("logtime desc")->limit($page->limit)->select();
            $this->assign('pagelist',$pagelist);
            $this->assign('info',$info);
            $this->display();
    }
    function addstudent(){
        $m=M("Manager");
        $id=$_SESSION['admin_id'];
        $data1=$m->where(array('id'=>array('eq',$id)))->find();
        if($data1['ad_role_id']==2){//辅导员
            $where['nj']=$data1['nj'];
        }
        $model=M('classes');
        $info=$model->where($where)->select();
        $this->assign('info',$info);
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
                  $fileName=$info['stufile']['savename'];
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
		          for($currentRow=2;$currentRow<=$allRow;$currentRow++){
			        //从哪列开始，A表示第一列
    			       for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
        				     //数据坐标
        				    $address=$currentColumn.$currentRow;
        				    //读取到的数据，保存到数组$arr中
        				    $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
    			        }
		          }
		      //以上是对excel表格里的数据进行提取，提取规范成数组的形式
			  $m=M('stubase');
    			 for($i=2;$i<=count($arr)+1;$i++){
    			     $data['stuclass']=$arr[$i]['A'];
    			     $c=M("classes");
    			     $nj=substr($arr[$i]['A'],-4,2);
    			     $info['classname']=$data['stuclass'];
    			     $info['nj']=$nj;
    			     $result=$c->where(array('classname'=>array('eq',$data['stuclass'])))->select();
    			     if(empty($result)){
    			         if(($rst=$c->add($info))===FALSE){
    			             $this->error("添加失败,请一次性导入一个班级的信息！");
    			             die();
    			         }
    			     }
    			     $data['nj']=$nj;
    			     $data['stuid']=$arr[$i]['B'];
    			     $pwd=substr($arr[$i]['B'], -6);
    			     $data['stuname']=$arr[$i]['C'];
    			    if($arr[$i]['D']=='男'){
    			      $data['sex']=1;
    			    }else{
    			      $data['sex']=0;
    			    }
    			   $data['idcard']=$arr[$i]['E'];
    			   $pwd=substr($arr[$i]['E'], -6);
    			   $data['phone']=$arr[$i]['F'];
    			   $data['email']=$arr[$i]['G'];
    			   $data['password']=md5($pwd.C('MD5_KEY'));
    			   $data['flag']=0;
    			   $res=$m->data($data)->add();
    			}
            }
            $this->success("数据上传成功！");
             exit;
          }
        if(IS_POST){
            $model=M('stubase');
            $data['stuid']=I('post.stuid');
            $data['stuclass']=$_POST['classname'];
            $data['stuname']=I('post.stuname');
            $data['idcard']=I('post.idcard');
            $data['sex']=I('post.sex');
            $data['email']=I('post.email');
            $data['phone']=I('post.phone');
            $data['nj']=substr($data['stuid'],4,2);
            $pwd=substr(I('post.idcard'),-6);
            $data['password']=md5($pwd.C('MD5_KEY'));
             $rst=$model->add($data);
             if($rst){
                 $this->success("学生数据添加成功！");
                 exit;
             }else{
                 $this->error("学生数据添加失败！");
                 exit;
             }
        }
        $this->display();
    }
    function  addstuteacher(){
    
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
                $fileName=$info['stufile']['savename'];
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
                for($currentRow=2;$currentRow<=$allRow;$currentRow++){
                    //从哪列开始，A表示第一列
                    for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                        //数据坐标
                        $address=$currentColumn.$currentRow;
                        //读取到的数据，保存到数组$arr中
                        $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
                    }
                }
                //以上是对excel表格里的数据进行提取，提取规范成数组的形式
                $m=M('stubase');
                for($i=2;$i<=count($arr)+1;$i++){
                    $stuid=$arr[$i]['A'];
                    $data['teacher']=$arr[$i]['M'];
                    if(!empty($stuid)){
                        $rst=$m->where('stuid='.$stuid)->save($data);
                        if($rst==FALSE){
                		          $this->error("对不起，给学生分配导师失败！");
                		      }
                    }
                }
            }
            $this->success("给学生分配导师成功！");
            exit;
        }
        $this->display();
    }
    function  addteacher(){
        
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
                $fileName=$info['adminfile']['savename'];
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
                for($currentRow=2;$currentRow<=$allRow;$currentRow++){
                    //从哪列开始，A表示第一列
                    for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                        //数据坐标
                				    $address=$currentColumn.$currentRow;
                				    //读取到的数据，保存到数组$arr中
                				    $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
                    }
                }
                //以上是对excel表格里的数据进行提取，提取规范成数组的形式
                        $m=M('Manager');
            	for($i=2;$i<=count($arr)+1;$i++){
            	    if($arr[$i]['B']!=''){
            	        $data['ad_username']=$arr[$i]['A'];
            	        $data['real_name']=$arr[$i]['B'];
            	        $data['ad_password']=md5($arr[$i]['A'].C('MD5_KEY'));
            	        $data['ad_role_id']=3;
            	        $rst=$m->add($data);
            	        if($rst===FALSE){
            	            $this->assign("添加导师管理员信息失败！");
            	        }
            	    }
            	}
            	$this->success("添加管理员信息成功！");
            	exit;
            }
        }
        $this->display();
    }
    public function downfile($file_name){
        $file_name=I('get.file_name');
        $file_path=__ROOT__.'/Public/File/';
        down_file($file_name,$file_path);
        return ;
    }
}




















