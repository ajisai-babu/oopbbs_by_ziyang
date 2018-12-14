<?php
    class Reg extends User{
    	//public function _DB()连接数据库
    	//写一个构造方法来接收表单的值
      
    	public function __construct($_userName,$_passWord,$_notPassword,$_Email){
    		$this->_username = $_userName;
    		$this->_password = $_passWord;
    		$this->_notpassword = $_notPassword;
    		$this->_email = $_Email;
    	} 
 
    	public function _query(){		
    		
        $connReg = new ConnectionDB($_POST['username'],$_POST['password'],$_POST['email']);
        $connReg->_connectionDB();
        $connReg->checkDB();
        if($this->_username==$connReg->checkArray['username']){
          Tool::_alertLocation('该用户名已被注册，请重试！','?index=reg');
        }else{
        $connReg->insertDB();
      }
        $connReg->closeDB();

    		Tool::_alertLocation('恭喜你，注册成功!','?index=login');

        
      }
    	
    	//给注册做验证
    	public function _check(){
    		if (empty($this->_username)||empty($this->_password)||empty($this->_notpassword)||empty($this->_email)){
    			 return false;
    		}else{
    		     return true;

    		 }

    	}
    
}
?>