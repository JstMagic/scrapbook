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


        $this->table('contact', function(handler $make){

            $make->int('id', 11, ['increment'=>'auto_increment']);
            $make->string('name', 255, ['default'=>'name here']);
            $make->setPrimarykey('id');
            $make->setUniquekey('name');

        });

    }

/*    public function discard(){

        $this->drop('users', function(handler $drop){

        });

    }*/

}
$flex = new flex();
$handler = new compose();

