<?php namespace App\Controllers;
use App\Models\Photo_model;
use App\Models\Like_model;
use App\Models\Comment_model;

class Home extends BaseController
{
	private $pht_model;
	private $lke_model;
	private $cmt_model;
	private $session;

	function __construct() {
		$this->pht_model = new Photo_model();
		$this->lke_model = new Like_model();
		$this->cmt_model = new Comment_model();
		$this->session = session();
    } 
	
	public function index()
	{
		$data = array();
		$photo = $this->pht_model->getAllPhoto(session('id'));

		foreach ($photo as $key) {
			$data[] = array('photo' => $key,
							'comment' => $this->cmt_model->getComment($key['pht_id']));
		}
		$result['photo'] = $data; 
		return view('layouts/index', $result);
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

	public function addComment(){
		if ($this->request->getMethod() === 'post'){
			$data = $this->request->getPost();
			$data['cmt_usr_id'] = session('id');
			
			$id = $this->cmt_model->insert($data);
			echo json_encode(session('username'));
		}
	}
}
