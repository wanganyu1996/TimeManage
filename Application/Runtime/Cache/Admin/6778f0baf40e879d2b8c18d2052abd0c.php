<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="/time/Public/Admin/css/admin.css" type="text/css" rel="stylesheet" />
        <script language=javascript>
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
          <?php foreach($p_info as $k=>$v):?>
        <table height="100%" cellspacing=0 cellpadding=0 width=170 
               background=/time/Public/Admin/img/menu_bg.jpg border=0>
               <tr>
                <td valign=top align=middle>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=/time/Public/Admin/img/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(<?php echo ($v['auth_id']); ?>) 
                                    href="javascript:void(0);"><?php echo ($v['auth_name']); ?></a>
                                    </td>
                                    </tr>
                    </table>
                    <table id=child<?php echo ($v['auth_id']); ?> style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                           <?php foreach($r_info as $kk => $vv): ?>
                           <?php if($v['auth_id']==$vv['auth_pid']){?>
                            <tr height=20>
                            <td align=middle width=30><img height=9 src="/time/Public/Admin/img/menu_icon.gif" width=9></td>
                            <td>
                            <a class=menuchild href="<?php echo U($vv['auth_module'].'/'.$vv['auth_action']);?>" target="right">
                              <?php echo $vv['auth_name'];?></a></td>
                          </tr>
                          <?php }?>
                       <?php endforeach;?>
                  </table>
                  </td>
               </tr>   
               </table>
              <?php endforeach;?>
    </body>
</html>