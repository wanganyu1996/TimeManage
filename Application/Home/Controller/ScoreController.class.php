<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
class ScoreController extends IndexController {
    public function showscore(){
        $stuid=$_SESSION['stuid'];
        if($stuid){
            $where['stuid']=array('eq',$stuid);
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
     }
        $this->display();
    }
}