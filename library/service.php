<?php
abstract Class Service extends Model {
    abstract public function tambahService($data);
    abstract public function hapusService($id);
}
