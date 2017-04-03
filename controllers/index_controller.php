<?php
class Index_Controller extends Controller{

	public function __construct() {
		parent::__construct();
		$header = new View();
		$header->Assign('app_title',APP_TITLE);
		$header->Assign('brand',APP_NAME);
		$header->Assign('user',getLoggedUser('fullname'));
		$this->Assign('header',$header->Render('header',false));

		$footer = new View();
		$this->Assign('footer',$header->Render('footer',false));
	}

	public function index() {
		logs('Masuk index Controller');
		// if(!checkSession()){
		// 	logs('Session tidak ditemukan');
		// 	redirect(SITE_ROOT,'auth/login');
		// }
		if(isset($_SESSION['path'])&&($_SESSION['path']!=='')){
			redirect(SITE_ROOT,$_SESSION['path']);
		}
		$this->Load_View('index');
	}

	public function about($data) {
		$this->Load_View('about');
		$this->Assign('heading','Tentang ' . APP_NAME);
		$this->Assign('content',' Donec id ....');
	}

	public function test() {
		$mail = new Email;
		$mail->to('infotech.solusindo@gmail.com');
		$mail->subject('Testing email');
		$mail->body('coba lagi');
		$mail->sendemail();
		/*
		// var_dump($mail);
		// $mail->sendemail();
		// if(is_object($mail)){
		// 	echo 'ini object';
		// }*/
	}
	public function cekemail(){
		$this->Load_Model('Pool');
		$data = $this->model->getAllNew();
		var_dump($data);
	}
}
