<?php namespace App\Controllers;
use App\Models\Photo_model;
use App\Models\Like_model;

class Home extends BaseController
{
	private $pht_model;
	private $lke_model;
	private $session;

	function __construct() {
		$this->pht_model = new Photo_model();
		$this->lke_model = new Like_model();
		$this->session = session();
    } 
	
	public function index()
	{
		$data['photo'] = $this->pht_model->getAllPhoto(session('id'));
		return view('layouts/index', $data);
	}

	public function addLike(){
		if ($this->request->getMethod() === 'post'){
			$data = $this->request->getPost();
			$data['lke_usr_id'] = session('id');
			
			$id = $this->lke_model->insert($data);
			echo json_encode($id);
		}
	}

	public function removeLike(){
		if ($this->request->getMethod() === 'post'){
			$data = $this->request->getPost();
			
			$id = $this->lke_model->delete($data['lke_id']);
			echo json_encode(true);
		}
	}
}
