<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 26/05/2015
 * Time: 23:32
 */

$realPath = realpath("../../../../../");

//include_once $realPath . "/core/config/dirNames.php";
//include_once $realPath."/app.autoloader.php";
//include_once $realPath."/core/databases/db.settings.php";
include_once"db.settings.php";


/**
 * Class up
 */
class up extends handler {
    /**
     *
     */
    public function __construct(){
        $this->setTable();
    }

    function setTable(){

        $streamLine = new db();
        $exec = $streamLine->setDataBank();

//        $stringInfo = "test".`$this->stringName`." ".$this->stringLength." ".$this->stringOptionsDefault." ".$this->stringOptionsSigned." ".$this->stringOptionsDefault;

        if(!empty($stringName)){
             $stringInfo = `$stringName`." ".$this->stringLength." ".$this->stringOptionsNull." ".$this->stringOptionsSigned." ".$this->stringOptionsDefault;
        }
        if(!empty($string2Name)){
            $string2Info = `$string2Name`." ".$this->string2Length." ".$this->string2OptionsNull." ".$this->string2OptionsSigned." ".$this->string2OptionsDefault;
        }

        $table = "CREATE TABLE IF NOT EXISTS `{$this->tableName}`(
         $stringInfo
         $string2Info


        )ENGINE=MyISAM  DEFAULT CHARSET=utf8";
//        $exec->exec($table);


   /*$sql = "CREATE TABLE IF NOT EXISTS `speakers` (
   `id` int(11) unsigned NOT NULL auto_increment,
   `name` varchar(255) NOT NULL default '',
   `image` varchar(255) NOT NULL default '',
   `bio` varchar(500) NOT NULL default '',
   `position` int(10) unsigned NOT NULL default '0',
   `status` tinyint(2) NOT NULL default '1',
   PRIMARY KEY  (`id`)
   ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";*/


    }

}



