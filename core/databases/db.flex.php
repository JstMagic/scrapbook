<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/05/2015
 * Time: 20:54
 */
include "../config/dirNames.php";
include_once ROOT."/app.autoloader.php";
include ENTITIES."class.flex.php";

class flex extends compose{

    public function __construct(){
        $this->raise();
    }

    public function raise(){


        $this->table('an', function(handler $make){


        });

    }

/*    public function discard(){

        $this->drop('users', function(handler $drop){

        });

    }*/

}
$flex = new flex();
$handler = new compose();

