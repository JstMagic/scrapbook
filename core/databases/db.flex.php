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

/**
 * Class flex
 */
class flex extends compose{
    /**
     * return function raise()
     */
    public function __construct(){
        $this->raise();
        $this->moSimpledFieldsQuery();
    }

    public function raise(){


        $this->table('person', function (handler $make) {

            $make->int('id', 11, ['increment'=>'auto_increment']);
            $make->string('lastname', 255, ['default' => 'name here']);

            $make->setPrimarykey('id');
            $make->setUniquekey('name');

        });

    }

/*    public function discard(){

        $this->drop('users', function(handler $drop){

        });

    }*/

    public function moSimpledFieldsQuery()
    {

        $MosimpleFields = new simpleFieldsQuery();
        $MosimpleFields->moSimpleQuery(['statement' => 'insert', 'table' => 'phone', 'field' => ['name', 'make', 'model', 'person_id'], 'value' => ['Bill', 'Gate', 'bill.wright@aceville.com', '11']]);

    }

}

//query database

//$MosimpleFields = new simpleFieldsQuery();
//$MosimpleFields->moSimpleQuery(['statement' => 'insert', 'table' => 'person', 'field' => ['firstname', 'lastname', 'email'], 'value' => ['John', 'Wright', 'john.wright@aceville.com']]);

$flex = new flex();
$handler = new compose();

