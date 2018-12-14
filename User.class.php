<?php
    //用户这个类用抽象类   制定一种规范
    abstract class User{
    	protected $user='user.xml';
    	protected $_username;
    	protected $_password;
    	protected $_notpassword;
    	protected $_email;

    	// 第一个方法  登录或者注册
    	abstract function _query();

    	//第二个方法  实验验证  注册 登录 都需要认证，
    	//可以用正则 ，  js脚本（不会用） php一些函数
    	
    	abstract function _check();
    }



?>