
<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/05/2015
 * Time: 15:24
 */


$RootDirName = "/scrapbook";
$_root_ = $_SERVER['DOCUMENT_ROOT'];if(strpos($_root_, $RootDirName) !== false){define("ROOT", $_SERVER['DOCUMENT_ROOT']);}else{define("ROOT", $_SERVER['DOCUMENT_ROOT'] . $RootDirName);}
include_once ROOT."/app.autoloader.php";

class phone extends create{
    /**
     * @var $id phone a unique id for the phone
     * @var $name phone the name of the phone, it can be anything you want
     * @var $make phone the make of the phone, e.g Samsung
     * @var $model phone the model of the phone, e.g Galaxy S5
     */
    protected $id;
    protected $name;
    protected $make;
    protected $model;
    protected $conn;
    protected $description;
    /**
     * @var /whose phone this is
     */
    protected $person_id;
    /**
     * @param $name phone name of phone
     * @param $make phone make of phone
     * @param null $model phone of phone
     */
    public function __construct(){
        //constructor to set the default parameter when a new phone object is created
//        spl_autoload_register('autoload');
//        $this->createDatabase();

//        $this->getInfo();

    }

    /**
     * @param $name /set a name for the phone
     * @param $make /enter the make of the phone
     * @param $model /enter the model name of the phone
     * @param $description /enter a phone description e.g Martin First phone
     * @param $person_id /id of the person the phone is associated with
     */
    function setPhone($name, $make, $model, $description, $person_id){
        $this->$name=$name;$this->model=$model;$this->description=$description;$this->person_id=$person_id;

        $this->createPhone($name,$make,$model, $description, $person_id);
    }

}

$class = new phone();
//$class ->setPhone("fsdfds","sdss","dsfs","sfs","dsf");


