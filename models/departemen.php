<?php
class Departemen extends Model {
    function __construct() {
        $db = DB_ENGINE;
        parent::__construct(new $db);
        $this->_db->setTable('departemen');
    }
    public function getDepartemen($parent = null) {
        return $this->_db->Exec('select * from departemen');
    }
    public function show($id) {
        $data = $this->_db->Exec("select * from departemen where iddepartemen = $id");
        return $data[0];
    }
    public function tambah($data) {
        return $this->_db->Create($data);
    }
    public function ubah($databaru, $id) {
        $this->_db->Update($databaru, $id, 'iddepartemen');
    }
    public function hapus($id) {
        return $this->_db->Exec("delete from departemen where iddepartemen = $id");
    }
}
