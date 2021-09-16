<?php 
namespace App\Controllers;
use App\Models\User_model;

class User extends BaseController
{
	private $usr_model;
	private $session;

	function __construct() {
		$this->usr_model = new User_model();
		$this->session = session();
    } 

	public function signin(){
		if(!isset($_SESSION['username'])){
            return view('layouts/signin');
        }else{ 
            return redirect()->to(base_url().'/Home');
        } 
	}

	public function signup(){
		if ($this->request->getMethod() === 'post'){
			$data = $this->request->getPost();
			if ($data['usr_password'] == $data['usr_repassword']) {
				$data['usr_password'] = md5($data['usr_password']);
				$id = $this->usr_model->insert($data); 
				
				$this->session->set('username', $data['usr_username']);
				$this->session->set('id', $id);
				return redirect()->to(base_url().'/Home');
			}else{
				$data = array('status' => '0');
				return view('layouts/signup', $data);
			}
        }else{
        	return view('layouts/signup');
        }
		
	}

	public function cekUser(){
		if ($this->request->getMethod() === 'post'){
			$data = $this->request->getPost();
			$login = $this->usr_model->mGetLogin($data['usr_username'], $data['usr_password']);
			if($login == null){
				$data = array('status' => '0');
				return view('layouts/signin', $data);
			}else{
				$this->session->set('username', $login['usr_username']);
				$this->session->set('id', $login['usr_id']);
				return redirect()->to(base_url().'/Home');
			}
        }else{
        	return view('layouts/signup');
        }

	}

	public function signout(){
		session_unset();
		session_destroy();
		return view('layouts/signin');
	}
}
