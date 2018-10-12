<?php
namespace app\admin\controller;

use lib\Auth;
use think\Controller;
use think\facade\Request;
use think\captcha\Captcha;


class Login extends Controller
{
    public function index()
    {
        behavior('app\\admin\\behavior\\CheckGuest');
		$t=session('timer');
		$timer = (isset($t))?$t:0;
		$this->assign('timer',$timer);
        return $this->fetch();
    }
	
    public function Login()
	{
        $captcha = Request::param('captcha');
		$timers = session('timer');
		if ($timers>3){
		   	
	   	  if(!captcha_check($captcha)){
	
		   $this->error('验证码错误.','',1);	
          };
		}
        behavior('app\\admin\\behavior\\CheckGuest');
		
        $name = Request::param('name');
        $password =Request::param('password');
        $remember =Request::param('remember');

        if(!Auth::guard()->login($name,$password,$remember)){
			$timers++;
			session('timer',$timers);
            $this->error('登录失败，请重新检查账号密码输入是否正确.','',2);
        };
		
		$timers=0;
		session('timer',null);
		//$this->redirect('News/category', ['cate_id' => 2]);
		$this->success('登录成功','admin/index/index',3,1);
        //$this->redirect('admin/index/index');
	   
    }

    public function logout()
    {
	    
        Auth::guard()->logout();
		behavior('app\\admin\\behavior\\CheckAuth');
   
        $this->redirect('admin/login/index');
    }
}
