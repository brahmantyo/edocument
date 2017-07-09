<?php
class KategoriDokumen extends Model {
    function __construct() {
        $db = DB_ENGINE;
        parent::__construct(new $db);
        $this->_db->setTable('kategoridokumen');
    }
    public function getKategori() {
        return $this->_db->Exec('select * from kategoridokumen');
    }
    public function show($id) {
        $data = $this->_db->Exec("select * from kategoridokumen where id = $id");
        return $data[0];
    }
    public function tambah($data) {
        return $this->_db->Create($data);
    }
    public function ubah($databaru, $id) {
        $this->_db->Update($databaru, $id);
    }
    public function hapus($id) {
        return $this->_db->Exec("delete from kategoridokumen where id = $id");
    }

}
