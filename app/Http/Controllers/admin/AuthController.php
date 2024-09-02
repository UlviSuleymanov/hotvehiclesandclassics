<?php

class AuthController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('UsersModel');
	}


	public function index()
	{
		$this->load->view('login');
	}

	//authification
	public function signIn()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		//userin email ve parolunu check edirik
		//eger userin emaili ve passwordu dogrudursa dashboarda oturur
		$isCorrectUser = $this->UsersModel->check_user();
		$isAdmin = $this->UsersModel->check_if_admin($isCorrectUser);
		//userin admin olub olmadigi yoxlanilir. eger admindirse admine uygun dashboarda gedir. eger adi userdise
		//dashboarda gedir.

		if ($isCorrectUser && $isAdmin) {
			$_SESSION['admin'] = $isCorrectUser;
			redirect('/Admin');
		} else {
			if ($isCorrectUser && !$isAdmin) {
				$_SESSION['user'] = $isCorrectUser;
				redirect('/User');
			}else if($isCorrectUser==null){
				redirect("/Auth/");
			}
		}
		unset($isCorrectUser);
		unset($newData);
		unset($isAdmin);
	}

	public function signUp()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('surname', 'surname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->view('signup');
		} else {
			$this->UsersModel->set_users();
			$this->load->view('success');
		}
	}

	public function exit(){
		session_destroy();
		redirect('/Auth/');
	}
}
