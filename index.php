<?php ob_start();//解决缓存问题，跳转到cookie生成 ?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
	<title>会员系统</title>
	<link rel="stylesheet" type="text/css" href="sty.css">
</head>
<body>
    <?php
        //魔法方法 __autoload()
       function __autoload($_classname){
       	include_once $_classname.'.class.php';

       }

       if (isset($_GET['index'])){
         	$_main = new Main($_GET['index']);
       }else{
        	$_main = new Main();//可以为空 null Mian()括号可以为空
       }
     /* if (empty($_GET['index'])) {
       	$_main = new Mian($_GET['index']);
       	elseif (empty($_GET['index']!=)) {
       		# code...
       	}
       }
       */
        // $_main->_ui();
        // $_main->_send();
        //为了安全 上面的可以修改一下；因为把另两个方法设置私有的；
        $_main->_run();
      ?>
</body>
</html>