<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 23/05/2015
 * Time: 02:47
 */

$RootDirName = "/scrapbook";

$_root_ = $_SERVER['DOCUMENT_ROOT'];
if(strpos($_root_, $RootDirName) !== false){
    define("ROOT", $_SERVER['DOCUMENT_ROOT']);
}else{define("ROOT",$_SERVER['DOCUMENT_ROOT'].$RootDirName);
}include_once ROOT."/core/config/dirNames.php";


/******************************/
//include ROOT."/app.autoloader.php";

include ENTITIES.FILE_CHARACTERS;

$routes = new routes();
$routes->setRoute("strict","characters");