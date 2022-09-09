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

        $root = $_SERVER['DOCUMENT_ROOT'];
        include_once ($root.'/inc/config.php');
        
        $this->conn = new mysqli(HOST, USER, PASS, DATABASE);

        return $this->conn->query($this->sql);
    }

    public function getCloseDb(){
        return $this->conn->close();
    }
}