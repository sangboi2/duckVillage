<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Productdb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
    // This setup empowers security.
        // class Connection{
        //     public static function Connect(){
        //         define('server', 'localhost');
        //         define('db_name', 'Productdb');
        //         define('user', 'root');
        //         define('password', 'root');
        //     $options = array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');
        //     try{
        //         $config = new PDO('mysql:host = server dbname=Productdb',user,password,$options);
        //         return $config;
        //     }catch(Exception $e){
        //         die("Connection Error:". $e->getMessage());
        //     }
        // }
        // }
?>