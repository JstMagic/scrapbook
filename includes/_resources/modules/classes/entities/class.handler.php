<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 27/05/2015
 * Time: 16:32
 */
include_once ROOT . "/app.autoloader.php";

class handler
{

    protected $PrimaryField;
    protected $UniqueField;

    protected $intName;
    protected $intLength;
    protected $intOptionsNull;
    protected $intOptionsIncrement;
    protected $intOptionsKey;
    protected $intOptionsSigned;
    protected $intOptionsDefault;

    protected $int2Name;
    protected $int2Length;
    protected $int2OptionsNull;
    protected $int2OptionsIncrement;
    protected $int2OptionsKey;
    protected $int2OptionsSigned;
    protected $int2OptionsDefault;

    protected $stringName;
    protected $stringLength;
    protected $stringOptionsNull;
    protected $stringOptionsIncrement;
    protected $stringOptionsKey;
    protected $stringOptionsSigned;
    protected $stringOptionsDefault;

    protected $string2Name;
    protected $string2Length;
    protected $string2OptionsNull;
    protected $string2OptionsIncrement;
    protected $string2OptionsKey;
    protected $string2OptionsSigned;
    protected $string2OptionsDefault;


    protected $textName;
    protected $textLength;
    protected $textOptionsNull;
    protected $textOptionsIncrement;
    protected $textOptionsKey;
    protected $textOptionsSigned;
    protected $textOptionsDefault;

    protected $text2Name;
    protected $text2Length;
    protected $text2OptionsNull;
    protected $text2OptionsIncrement;
    protected $text2OptionsKey;
    protected $text2OptionsSigned;
    protected $text2OptionsDefault;

    protected $table;
    protected $datetime;
    protected $dateTimeOption;
    protected $timestamp;

    protected $passwordName;
    protected $incrementId;

    function int($intName, $intLength, $intOptions=array())
    {
        $option = ['null'=>'','increment'=>'', 'key'=>'', 'signed'=>'', 'default'=>''];
        $default = array_merge($option, $intOptions);

        $this->intName = $intName; $this->intLength = "int(".$intLength.")";
        $this->intOptionsNull = $default['null'];
        $this->intOptionsIncrement = $default['increment'];
        $this->intOptionsKey = $default['key'];
        $this->intOptionsSigned = $default['signed'];
        if(!empty($default['default'])){
            $this->intOptionsDefault = "default "."'{$default['default']}'";
        }

    }
    function int2($int2Name, $int2Length, $intOptions=array())
    {
        $option = ['null'=>'','increment'=>'', 'key'=>'', 'signed'=>'', 'default'=>''];
        $default = array_merge($option, $intOptions);

        $this->intName = $int2Name; $this->int2Length = "int (".$int2Length.")";
        $this->int2OptionsNull = $default['null'];
        $this->int2OptionsIncrement = $default['increment'];
        $this->int2OptionsKey = $default['key'];
        $this->int2OptionsSigned = $default['signed'];
        if(!empty($default['default'])){
            $this->int2OptionsDefault = "default "."'{$default['default']}'";
        }

    }

    function string($stringName,$stringLength, $StringOptions=array())

{
    $option = ['null'=>'','increment'=>'', 'key'=>'', 'signed'=>'', 'default'=>''];
    $default = array_merge($option, $StringOptions);

    $this->stringName = $stringName;
    $this->stringLength = "varchar(".$stringLength.")";
    $this->stringOptionsNull = $default['null'];
    $this->stringOptionsIncrement = $default['increment'];
    $this->stringOptionsKey = $default['key'];
    $this->stringOptionsSigned = $default['signed'];
    if(!empty($default['default'])){
        $this->stringOptionsDefault = "default "."'{$default['default']}'";
    }


}
    function string2($string2Name,$stringLength, $StringOptions=array())

    {
        $option = ['null'=>'','increment'=>'', 'key'=>'', 'signed'=>'', 'default'=>''];
        $default = array_merge($option, $StringOptions);

        $this->string2Name = $string2Name;
        $this->string2Length = "varchar(".$stringLength.")";
        $this->string2OptionsNull = $default['null'];
        $this->string2OptionsIncrement = $default['increment'];
        $this->string2OptionsKey = $default['key'];
        $this->string2OptionsSigned = $default['signed'];
        if(!empty($default['default'])){
            $this->string2OptionsDefault = "default "."{$default['default']}";
        }


    }

    function text($textName,$textOptions=array())
    {
        $option = ['null'=>'','increment'=>'', 'key'=>'', 'signed'=>'', 'default'=>''];
        $default = array_merge($option, $textOptions);

        $this->textName = $textName;
        $this->textLength = "text";
        $this->textOptionsNull = $default['null'];
        $this->textOptionsIncrement = $default['increment'];
        $this->textOptionsKey = $default['key'];
        $this->textOptionsSigned = $default['signed'];
        if(!empty($default['default'])){
            $this->textOptionsDefault = "default "."'{$default['default']}'";
        }


    }
    function text2($text2Name,$textOptions=array())
    {
        $option = ['null'=>'','increment'=>'', 'key'=>'', 'signed'=>'', 'default'=>''];
        $default = array_merge($option, $textOptions);

        $this->text2Name = $text2Name;
        $this->text2Length = "text";
        $this->text2OptionsNull = $default['null'];
        $this->text2OptionsIncrement = $default['increment'];
        $this->text2OptionsKey = $default['key'];
        $this->text2OptionsSigned = $default['signed'];
        if(!empty($default['signed'])){
            $this->text2OptionsDefault = "default "."'{$default['default']}'";
        }

    }

    function password($passwordName)
    {
        $this->passwordName = $passwordName;
    }


    function increment($incrementId)
    {
        $this->incrementId = $incrementId;
    }

    function datetime($dateTime, $dateTimeOption = array())
    {

        $this->datetime = $dateTime; $this->dateTimeOption = $dateTimeOption;
    }

    function timestamp($timeStamp, $timeStampOption=array())
    {
        $this->timestamp = $timeStamp; $this->dateTimeOption = $timeStampOption;

    }

    /**
     * @param $field String what field should have the  primary key
     */
    function setPrimarykey($PrimaryField){
        $this->PrimaryField = $PrimaryField;
    }
    /**
     * @param $field String what field should have the  unique key
     */
    function setUniquekey($UniqueField){
        $this->UniqueField = $UniqueField;
    }

}