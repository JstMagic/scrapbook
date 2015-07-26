<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/05/2015
 * Time: 15:21
 */

require_once "/../../../module/classes/interfaces/people.php";
require_once"/../../../../../core/databases/database.php";

class create extends database implements people
{
    protected $userId;
    protected $firstName;
    protected $lastName;
    protected $emailAddr;
    protected $conn;

    function __construct()
    {
            $this->conn = $this->createDatabase();

//            $this->createPerson("Martin","Lawrence","damgxx@gmail.com");

    }

    /**
     * @param $firstName
     * @param $lastName
     * @param $emailAddr
     */
    function createPerson($firstName,$lastName, $emailAddr)
    {
        if($this->conn = $this->createDatabase()){
            //do nothing
        }else{
            $this->conn = $this->createDatabase();
        }

        $this->firstName = $firstName; $this->lastName = $lastName; $this->emailAddr = $emailAddr;

        $stmt = $this->conn->prepare("INSERT INTO person (firstname,lastname,email) VALUE (?, ?, ?) ");
        $stmt->bindParam("1",$firstname);
        $stmt->bindParam("2",$lastname);
        $stmt->bindParam("3",$emailAddr);

        $firstname = $firstName; $lastname = $lastName; $email = $emailAddr;
        $stmt->execute();

    }

    function createPhone($phoneName, $phoneMake, $phoneModel, $phoneDescription, $personId){

        $db = $this->createDatabase();
        $stmt = $db->prepare("INSERT INTO phone (name, make, model, decription, person_id)VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam('1',$phoneName);
        $stmt->bindParam('2',$phoneMake);
        $stmt->bindParam('3',$phoneDescription);
        $stmt->bindParam('4',$personId);
        $stmt->execute();
    }

    /**
     * @param $taskName create the name of the task you want to create e.g Event
     * @param $taskDescription create the name of the task description e.g Beach Party
     */
    function createTask($taskName, $taskDescription)
    {

    }

    function createScrapbook($scrapBookName, $scrapBookTitle, $scrapBookDescription, $scrapBookImage){

    }

}
//$people = new people();