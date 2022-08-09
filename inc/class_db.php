<?php
class Database {

    public $conn;
    public $sql;

    function __construct($sql)
    {
        $this->sql = $sql;
    }

    // получаем соединение с БД
    public function getConnection(){
        
        include_once (__DIR__.'/config.php');
        
        $this->conn = new mysqli(HOST, USER, PASS, DATABASE);
        return $this->conn->query($this->sql);
    }
}