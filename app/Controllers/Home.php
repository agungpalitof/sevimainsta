<?php namespace App\Controllers;
use App\Models\Photo_model;

class Home extends BaseController
{
	private $pht_model;
	private $session;

	function __construct() {
		$this->pht_model = new Photo_model();
		$this->session = session();
    } 
	public function index()
	{
		$data['photo'] = $this->pht_model->getAllPhoto(session('id'));
		return view('layouts/index', $data);
	}
}
