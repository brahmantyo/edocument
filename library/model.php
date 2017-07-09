<?php

abstract class Model {
    public $_db;
    public function __construct(Database $db) {
        $this->_db = $db;
    }
}
