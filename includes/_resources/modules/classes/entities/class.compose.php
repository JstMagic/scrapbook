<?php

/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 27/05/2015
 * Time: 15:44
 */

include_once ROOT . "/app.autoloader.php";

/**
 * Class compose
 */
class compose extends handler
{

    /**
     * @var $tableName, the name of the current table
     */
    public $tableName;


   function table($createdTableName, $handlerFunction)
    {
        $handlerFunction($this);

        $streamLine = new db();
        $exec = $streamLine->setDataBank();
       try {
           $table = "CREATE TABLE IF NOT EXISTS `{$createdTableName}`(`timestamp` TIMESTAMP) ENGINE=MyISAM DEFAULT CHARSET=utf8";
           $exec->exec($table);
       }catch (PDOException $e)   {

           $message = $e;
       }
       if(!empty($this->intName)){
           try {
               $intInfo = "ADD COLUMN {$this->intName}" . " " . $this->intLength . " " . $this->intOptionsNull . " " . $this->intOptionsSigned . " " . $this->intOptionsDefault;
               $alterint = "ALTER TABLE `{$createdTableName}` $intInfo";
               $exec->exec($alterint);
           }catch (PDOException $e){

               $message = $e;
           }
       }
       if(!empty($this->stringName)){
       try {
           $stringInfo = "ADD COLUMN {$this->stringName}" . " " . $this->stringLength . " " . $this->stringOptionsNull . " " . $this->stringOptionsSigned . " " . $this->stringOptionsDefault;
           $alterString = "ALTER TABLE `{$createdTableName}` $stringInfo";
               $exec->exec($alterString);
           }catch (PDOException $e){

           $message = $e;
           }
       }
       if(!empty($this->string2Name)) {
           try {
               $string2Info = "ADD COLUMN {$this->string2Name}" . " " . $this->string2Length . " " . $this->string2OptionsNull . " " . $this->string2OptionsSigned . " " . $this->string2OptionsDefault;
               $alterString2 = "ALTER TABLE `{$createdTableName}` $string2Info";
               $exec->exec($alterString2);
               echo $this->string2Name." added successfully to ". $createdTableName ."Table";
           }catch (PDOException $e){

               $message = $e;
           }

       }if(!empty($this->textName)) {
           try {
              echo  $textInfo = "ADD COLUMN {$this->textName}" . " " . $this->textOptionsNull . " " . $this->textOptionsSigned . " " . $this->textOptionsDefault;
               $alterText = "ALTER TABLE `{$createdTableName}` $textInfo";
               $exec->exec($alterText);
               echo $this->textName." added successfully to ". $createdTableName ."Table";
           }catch (PDOException $e){
               $message = $e;
           }
    }

        try{
            if(!empty($this->PrimaryField)){
                $primary = "ALTER TABLE `{$createdTableName}` ADD PRIMARY KEY ($this->PrimaryField)";
                $exec->exec($primary);
                echo "Primary key added successfully to ". $this->PrimaryField;
            }
        }catch (PDOException $e){
            $message = $e;

        }
        try {
            if (!empty($this->UniqueField)) {
                $uniCost = "ADD CONSTRAINT unique_$this->UniqueField UNIQUE ($this->UniqueField)";
                $unique = "ALTER TABLE `{$createdTableName}` $uniCost";
                $exec->exec($unique);
                echo "Unique key added successfully to ". $this->UniqueField;
            }
        }catch (PDOException $e){
            $message = $e;
        }

        if(!empty($message)){
            $info = "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'>";

            $info .= "<p>DATABASE INFORMATION</p>";

            $info .= "<p>ERROR MESSAGE     : $message</p>";

            $info .= "</div>";

//            echo $info;
        }

    }

    function drop($createdTableName, $handlerFunction){

    }


}