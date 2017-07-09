<?php
/**
* 
*/
interface Database
{
    public function connect();
    public function Exec($sql);
}
