<?php
/**
 * User: Martin
 * Date: 25/05/2015
 * Time: 18:42
 */

//include "/../config/dirNames.php";


    include CLASS_DATABASES."class.settings.php";



class db extends settings
{ public function __construct(){$this->stream();}


    function stream(){


        $whatToUse = "conn2";
        // after adjusting the database below to your preferences, enter a particular connection to use
        //  Note: only one connection can be used at a time, if you are working on a production server,
        //   then modify your choices


        $dbConnect = [
            /*Set a list of connections to use in between development and productions, Multiple connections can be set,
            /*
            /* but only one connection can be used at a time
            */

            "connections" => [


                "conn1" => [

                    "DB__HOST" => "localhost",
                    "DB__NAME" => "scrapbook",
                    "DB__USER" => "martin",
                    "DB__PASSWORD" => "cookies",

                ],


                "conn2" => [

                    "DB__HOST" => "mysql1000.mochahost.com",
                    "DB__NAME" => "monyesom_scrapbook",
                    "DB__USER" => "monyesom_martin",
                    "DB__PASSWORD" => "justasithought123",

                ]

            ]

        ];

        /**
         * in db sections, we can specify multiple connections to use, atm i have two, one for localhost and one for my live server
         */


































        $this->whatToUse = $whatToUse; $this->connections = $dbConnect;

    }



}

$streamline = new db();
$exec = $streamline->setDataBank();
