<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 25/05/2015
 * Time: 14:12
 */
//include_once "../../../app.autoloader.php";
include_once ROOT."/app.autoloader.php";
/*spl_autoload_register(function ($class) {
    include "class.".$class . '.php';
});*/

/**
 * Class settings
 */
class settings extends database {
    /**
     * @var string $whatToUse connection to use which takes a numeric number, how ever you have declared it
     * @var string $connections the database connections specified
     */
    protected $whatToUse;
    protected $connections;

    /**
     * @param $whatConToUse string amongst the list of predefined connection set by the user
     * @param array $ListOfConnections takes an array of connections set by the user in db.settings
     */
    public function __construct($whatConToUse,$ListOfConnections = array()){

        $this->whatToUse = $whatConToUse; $this->connections = $ListOfConnections;

        $this->setDataBank();
    }

    /**
     * @class setDataBank retrieve the list of connections made available to be used in db.settings class
     * @return PDO setDataBank retrieve the list of connections made available to be used in db.settings class
     */

    function setDataBank(){
        $whatToUse = $this->whatToUse; $connections = $this->connections;

        if(is_array($connections)){
            foreach ($connections as $name => $connections_name) { // loop through the first set of elements of array from the initial start of the array pointer "connections => connection to use"

                foreach ($connections_name as $dbInfo => $dbName) { // loop through the second element of the arrays, set what connection e.g conn1 as the key and get the values eg. DB_HOST, DB_USER

                    foreach($dbName as $dbNameKey => $dbNameValue){// loop through the 3rd element of the setting the value from previous loop as the key and get the key pair value, KEY => VALUE

                        if(!empty($whatToUse)){
                            if ($dbInfo===$whatToUse){// if a key is === to what database to use then run the following condition, otherwise print some lovely displayed errors
                                $DB__HOST = $dbName['DB__HOST']; $DB__NAME = $dbName['DB__NAME'];
                                $DB__USER =$dbName['DB__USER'];  $DB__PASSWORD = $dbName['DB__PASSWORD'];
                                return $this->createDatabase($DB__HOST,$DB__NAME,$DB__USER, $DB__PASSWORD);// pass in the looped database information and the createDatabase takes care of the rest
                                break;
                            }
                        } else{
                            echo "<div class='container'><h3><b>".$whatToUse."</b> isn't amongst the list of predefined connection, <br>
                         check your database connection settings"."</h3></div>";
                            break;
                        }

                    }

                }
            }
        }

    }

}
