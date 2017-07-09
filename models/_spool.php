<?php
class Pool_Model extends Model
{
	function __construct()
	{
		logs(get_class($this));
		$classname = DB_ENGINE;
		$this->_db = new $classname();
		$this->tbname = 'tbpool';
	}

	public function getAllNew(){
		return $this->_db->Exec('SELECT * FROM '.$this->tbname.' WHERE status = "0" ORDER BY ctime');
	}
}