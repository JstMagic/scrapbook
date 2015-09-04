<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/05/2015
 * Time: 10:53
 */


    class database{

        public $pdo;
        public $create;
        protected $DB_HOST;
        protected $DB_NAME;
        protected $DB_USER;
        protected $DB_PASSWORD;
        protected $success;
        protected $statusMessage;

        /**
         *
         */
        function __construct(){

            $this->DB_NAME;
//            $this ->pdo = null;

        }

        /**
         * @param $host String database server address, aka hostname
         * @param $name String name of the database you wish to connect to
         * @param $user String name of the user who would want to initial the connection
         * @param $pass String password of the user who wants to initial the connection
         * @return PDO database return pdo object with database information for use of generating different data
         */
        function createDatabase($host,$name,$user,$pass){

            $this ->DB_HOST = $host; $this->DB_NAME = $name; $this -> DB_USER = $user; $this->DB_PASSWORD = "*****";

            $HOST = $this ->DB_HOST;$NAME = $this ->DB_NAME;$USER = $this ->DB_USER;$PASSWORD = $pass;
            $error = "Database: connection could not be made, please check the following error!- ";
            try{
                $this->pdo = new PDO("mysql:host=$HOST;dbname=$NAME", $USER, $PASSWORD);
                //@var $HOST setup the database connection
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->success = true;
                //return true if successful
                $this->statusMessage = "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'><h1>SUCCESSFUL</h1></div>";
            }catch (PDOException $e){
                $this->statusMessage = "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'><h1>NOT SUCCESSFUL</h1>";
                echo "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'><p>".$error."</p><br><p>".$e->getMessage()."</p></div>";
                $this->success = false;

            }return $this->create = $this->pdo;

        }
        function getInfo(){
            if($this->success === true){
                $info = "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'>";

                $info .= "<p>DATABASE INFORMATION</p>";

                $info .= "<p>HOST     : $this->DB_HOST</p>";
                $info .= "<p>DATABASE : $this->DB_NAME</p>";
                $info .= "<p>USER     : $this->DB_USER</p>";
                $info .= "<p>PASSWORD : $this->DB_PASSWORD</p>";

                $info .= "</div>";
            }else{
                $info = "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'>";

                $info .= "<p>DATABASE INFORMATION</p>";
                $info .= "<p>NO DATABASE CONNECTION FOUND</p>";

                $info .= "</div>";
            }
            echo $info;
        }

        function close(){
            //end database connection
            if($this->success === true){
                $this->pdo = null;

            }else{
                $this->pdo = null;
            }
        }

        function set(){
            return $this->create;
        }
        function isSuccessful(){
            //check to see the status of the database
            echo "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'>".$this->statusMessage;
            echo "<p>Status : ", $this->success, "</p></div>";
        }

    }
