<?php


   class Login extends User{
    	//写一个构造方法来接受表单的值；
    	public function __construct($_userName,$_passWord){
    		$this->_username = $_userName;
    		$this->_password = $_passWord;
    	}
         //将信息注册到XML中
    	public function _query(){
            $conn = new ConnectionDB($_POST['username'],$_POST['password'],' ');
    		$conn->run();
            $conn->selectDB();
            
            if($this->_username == $conn->resArray['username']&& $this->_password == $conn->resArray['password']){
              setcookie('username', $this->_username);
                echo '登陆成功';
                Tool::_alertLocation($this->_username.'.欢迎你回来','?index=Member');
            }else{
                
                Tool::_alertBack('登录失败');
            }
            $conn->closeDB();
    	}
    	public function _check(){
    	if (empty($this->_username)||empty($this->_password)){
                return false;
            }else{
                return true;
        }
}

}
?>