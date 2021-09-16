<?php namespace App\Controllers;
use App\Models\User_model;
use App\Models\Photo_model;

class Profile extends BaseController
{
	private $usr_model;
	private $pht_model;
	private $session;

	function __construct() {
		$this->usr_model = new User_model();
		$this->pht_model = new Photo_model();
		$this->session = session();
    } 

	public function index()
	{
		$data['user'] = $this->usr_model->getUser(session('id'));
		$data['photo'] = $this->pht_model->getPhoto(session('id'));
		return view('layouts/profile', $data);
	}

	public function add(){
		if ($this->request->getMethod() === 'post'){
			$data = $this->request->getPost();

			$data['pht_lke_status'] = (isset($data['pht_lke_status']))? '1':'0';
			$data['pht_cmn_status'] = (isset($data['pht_cmn_status']))? '1':'0';
			$data['pht_private'] = (isset($data['pht_private']))? '1':'0';
			$data['pht_usr_id'] = session('id');


			if($file = $this->request->getFiles()['pht_image'])
			{
				if($file->isValid())
				{ 
					$name = $file->getRandomName();
					$file->move(ROOTPATH . 'public/image/', $name); 
					$data['pht_image'] = $name;
					// $this->b_custom->compressImage(ROOTPATH . 'public/upload/tabungan/bukti/'. $name);
				}  
				else{
					$data['pht_image'] = null;
				}
			}  

			$insert = $this->pht_model->insert($data); 
			return redirect()->to(base_url().'/Profile');

		}else{
			return view('layouts/add');
		} 
	}
}
