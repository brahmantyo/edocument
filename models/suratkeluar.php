<?php
class SuratKeluar extends Dokumen {
    function __construct() {
        $this->setKategori(3); //Surat Keluar
    }

    public function getAllNew() {
        return $this->_db->Exec("SELECT * FROM $this->tbname WHERE kategori = $this->kategori and status = '0' ORDER BY tgl DESC");
    }
    public function getTerkirim() {
        $sql = "select * from dokumen where kategori = $this->kategori and status = '1' order by tgl desc";
    }
    public function getDiterima() {
        $sql = "select * from dokumen where kategori = $this->kategori and status = '2' order by tgl desc";
    }
    public function getDitolak() {
        $sql = "select * from dokumen where kategori = $this->kategori and status = 'x' order by tgl desc";
    }
}