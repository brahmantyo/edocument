<?php
class Service_Model extends Model
{
	function __construct()
	{
		// logs(get_class($this));
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		$this->tbname = 'service';
	}

	public function getInitServiceStatus(){
		return $this->_db->Exec('SELECT status FROM '.$this->tbname.' WHERE name = "init" LIMIT 1',null,'silent');
	}

	public function setInitServiceStatus($status){
		return $this->_db->Exec('UPDATE '.$this->tbname.' SET status = "'.$status.'", starttime = NOW() WHERE name = "init" LIMIT 1',null,'silent');		
	}

	public function getServices(){
		return $this->_db->Exec('SELECT * FROM '.$this->tbname.' WHERE name <> "init"',null,'silent');
	}

	public function setServiceStart($name){
		// echo 'Start:'.date('Y-m-d h:m:s');
		return $this->_db->Exec('UPDATE '.$this->tbname.' SET status = "1", starttime = NOW() WHERE name = "'.$name.'" LIMIT 1',null,'silent');	
	}

	public function setServiceStop($name){
		// echo 'Stop:'.date('Y-m-d h:m:s');
		return $this->_db->Exec('UPDATE '.$this->tbname.' SET status = "0", laststop = NOW() WHERE name = "'.$name.'" LIMIT 1',null,'silent');	
	}

}