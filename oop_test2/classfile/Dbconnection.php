<?php
class DbConnection{
 
    private $host = 'localhost';
    private $username = 'user';
    private $password = '123456';
    private $database = 'quizapp';
 
    protected $connection;
 
    public function __construct(){
 
        if (!isset($this->connection)) {
 
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
 
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
        return $this->connection;
    }
}
?>