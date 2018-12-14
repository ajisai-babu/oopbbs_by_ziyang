<?php
    class Main{

    	private $_index; 
    	private $_send;
      
    	//reg  login null
    	//主类
    	//1 控住不同页面的切换
    	//2 处理不同的数据  如 input表单 注册|登录 两个表单提交的数据
    	public function __construct($_index=''){//构造方法
               $this->_index = $_index; //主要有reg 和 login 传进来  还有一个null
              //echo $this->_index;
               if (isset($_POST['send'])){
               	$this->_send = $_POST['send'];
               }
               
    	}
         public function _run(){
         	//处理数据
         	 $this->_send();
         	//如果注释了，xml文件就不会生成

         	include $this->_ui();
         }

    	
        private function _ui(){
    		if(empty($this->_index)||!file_exists($this->_index.'.php')){//_index 将会有两个reg或者login 传进来 否则index将传入start
    			$this->_index='start';
    		}
    			return $this->_index.'.php';
        }
    	// ui 方法 切换到两个页面 登录 注册
    	/*private function _ui(){
    		if(empty($this->_index)){
    			include_once 'start.php';
    		}else{
    			include_once $this->_index.'.php';
    		}
    	}
    	*/
    		
    	private function _send(){
    	     switch ($this->_send){
    	     	case '注册':
    	     	//$_reg = new Reg();
    	     	//$this->_exec($_reg);
    	     	   $this->_exec(new Reg($_POST['username'],$_POST['password'],$_POST['notpassword'],$_POST['email']));
    	     		break;
    	     	case '登录':


    	     	//$_login = new Login();
    	     	//$this->_exec($_login);
    	     		$this->_exec(new Login($_POST['username'],$_POST['password']));
              
    	     		break;
    	     }	

    	}
          //创建一个执行的方法，里面传入一个参数，是Reg或者Login类对象引用
         private function _exec($_class){
          	if ($_class->_check()){
          		$_class->_query();
          	}else{
          		Tool::_alertBack('字段不能为空!');
          	}
          }
    }
?>