<?php
class Service_Controller extends Controller
{
	public function __construct(){
		global $log_type ;
		$log_type = 2;
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

	public function init(){
		$this->Load_Model('Service');
		$this->model->setInitServiceStatus('1');
		// logs('Status: '.$init[0]->status);
		for(;;){
			$init = $this->model->getInitServiceStatus();
			if($init[0]->status!='0') {
				//$this->loop();
				if($init[0]->status=='3') exit;
			}
			$nano = time_nanosleep(0, 100000);

			if ($nano === true) {
			    echo "Slept for 2 seconds, 100 microseconds.\n";
			} elseif ($nano === false) {
			    echo "Sleeping failed.\n";
			} elseif (is_array($nano)) {
			    $seconds = $nano['seconds'];
			    $nanoseconds = $nano['nanoseconds'];
			    echo "Interrupted by a signal.\n";
			    echo "Time remaining: $seconds seconds, $nanoseconds nanoseconds.";
			}
		}
	}

	public function loop(){
		logs('cek pool sekarang');
	}
}