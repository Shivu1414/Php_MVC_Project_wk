<?php
class dataBase{
    public $servername = "localhost";
    public $username = "root";
    public $password = "webkul";
    public $dbname="PhpOopsTaskDb";
    public $conn="";

    function __construct(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $sql = "CREATE DATABASE PhpOopsTaskDb";

        if ($this->conn->query($sql) === TRUE) {
        echo "<script>alert('Database created successfully')</script>";
        $this->conn->close();
        } else {
            // echo "<script>alert('Database already created ')</script>";
            $this->conn->close();
        }
    }

    public function adminDbConn(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function createTable($conn){
        $sql = "CREATE TABLE adminregistration (
            sr INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, adminname VARCHAR(30) NOT NULL, email VARCHAR(50), adminpassword varchar(80))";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Table created successfully')</script>";
            $conn->close();
            } else {
                // echo "<script>alert('Table already created ')</script>";
                $conn->close();
            }      
    }

    public function createUserTable($conn){
        $sql = "CREATE TABLE userregistration (
            sr INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50),phoneno VARCHAR(25), gender VARCHAR(25), aboutuser VARCHAR(50), useraddress VARCHAR(50), pincode VARCHAR(25), userpassword varchar(80), imgurl VARCHAR(50), usercountry VARCHAR(25), userstate VARCHAR(25),usercity VARCHAR(25))";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Table created successfully')</script>";
            $conn->close();
            } else {
                // echo "<script>alert('Table already created ')</script>";
                $conn->close();
            }      
    }

    public function createJobPost($conn){
        $sql = "CREATE TABLE postedjob (sr INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, email VARCHAR(50), postlocation VARCHAR(50), jobtitle varchar(80), imgurl VARCHAR(50))";      
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Table created successfully')</script>";
            $conn->close();
        } 
        else{
            // echo "<script>alert('Table already created ')</script>";
            $conn->close();
        }      
    }

    public function createPublishPost($conn){
        $sql = "CREATE TABLE publishpost (sr INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, email VARCHAR(50), postlocation VARCHAR(50), jobtitle varchar(80), imgurl VARCHAR(50))";      
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Table created successfully')</script>";
            $conn->close();
        } 
        else{
            // echo "<script>alert('Table already created ')</script>";
            $conn->close();
        }      
    }

}
?>

