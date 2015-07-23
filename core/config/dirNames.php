<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 20/05/2015
 * Time: 19:50
 */
$env = "local";

$RootDirName = "/scrapbook";
$_root_ = $_SERVER['DOCUMENT_ROOT'];


if(strpos($_root_, $RootDirName) !== false){
    if(!defined('ROOT')) {

        define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    }
}else{
    if(!defined('ROOT')) {
        define("ROOT", $_SERVER['DOCUMENT_ROOT'] . $RootDirName);
    }
}include_once ROOT."/core/config/dirNames.php";

define("SPECIAL_ROOT",$_SERVER['SERVER_NAME']."/scrapbook/");

define("CORE",ROOT."/core/");

define("CONFIG",CORE."config/");

define("DATABASE",CORE."databases/");

define("INCLUDES",ROOT."/includes/");

define("IMG",ROOT."/img/");

define("CSS",ROOT."/css/");

define("JS",ROOT."/js/");

define("FONTS",ROOT."/fonts/");

define("RESOURCES",INCLUDES."_resources/");

define("MODULES",RESOURCES."modules/");

define("CLASSES",MODULES."classes/");

define("APPS",MODULES."apps/");

define("ADMIN",CLASSES."admin/");

define("CLASS_DATABASES",CLASSES."databases/");

define("DATA",CLASSES."data/");

define("ENTITIES",CLASSES."entities/");

define("INTERFACES",CLASSES."interfaces/");

define("CONTROLLER",INCLUDES."controller/");

define("VIEW",INCLUDES."view/");

include("filenames.php");






