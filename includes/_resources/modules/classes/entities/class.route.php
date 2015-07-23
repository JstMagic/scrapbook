<?php

session_start();
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22/05/2015
 * Time: 12:16
 */
include "class.whois.php";

class routes extends whois
{
    /**
     * @var $mode /return the link integrity whether strict, moderate or default;
     * $var $filename return the name of the file that was passed through the parameter, in this case the url link name
     * $var $Regex return an array of file names with path
     * $var $strippedNames return the names of file names after the file extension has been striped off for comparison
     * $var $baseName returns name the name of the file without the file path and extension
     * $var $type return mode type set in the parameter of setRoute, used for links and for comparisons and to ignore
     * 404 error if link mode is moderate.
     */
    protected $mode;
    protected $fileName;
    protected $options;
    protected $Regex;
    protected $strippedNames;
    protected $baseName;
    protected $type;
    protected $default;
    protected $defaultPage_dir ;
    protected $four0four_dir ;
    protected $four0four;


    function __constructor()
    {
        $this->view();

    }

    /**
     * @param array $options returns array of settings entered in the setDefailt parameter which will then be used to set
     * how the software behaves, and example would be setting a default 404 error page
     */
    function setDefault($options = array())
    {

        $fileN = $this->fileName;
        $ThisFiles = $this->Regex;
        $this->baseName=$basename = array();
        $TrueFalse = array();

        $defaults = [
            "defaultDir" => "",
            "defaultPage" => "",
            "404Dir" => "",
            "404Page" => ""
        ];

        $currentPath = trim($_SERVER["REQUEST_URI"]);
        $piecesExploded = explode("/", $currentPath);

        $host = trim(end($piecesExploded));
        $hostUrl = implode(" ", $piecesExploded);

        $config = array_merge($defaults, $options);

        $this ->default = $default = trim($config['defaultPage']);
        $this ->defaultPage_dir = $defaultPage_dir =$config['defaultDir'];
        $this ->four0four_dir = $four0four_dir = $config['404Dir'];
        $this ->four0four = $four0four = $config['404Page'];

        foreach ($ThisFiles as $name => $object) {
            foreach ($object as $obj) {
                $basename[] = strstr(basename($obj), ".", true);
                if (in_array($default, $basename)) {
                    $TrueFalse[] = 1;
                } else {
                    $TrueFalse[] = 0;
                }

            }
        }
            $arrayValue = array_values($TrueFalse);
            $finalTrueFalse = $arrayValue[0];

            $checkAssignmentError = end($piecesExploded) === "" ? 0 : 1;
            $checkAssignmentDefault = end($piecesExploded) === $default ? 1 : 0;

        if (!empty($default) && $checkAssignmentDefault === 0 && $checkAssignmentError === 0 && $finalTrueFalse === 0) {
            echo $contents = file_get_contents(VIEW . $defaultPage_dir. "/" . $default . ".php");

//        }elseif(!in_array($host,$basename) && $this->type != "moderate") {
        }elseif(!in_array($host,$basename)) {
            if (!file_exists(ROOT . "/404.php")) {
                $f = fopen(ROOT . "/404.php", "w");
                fclose($f);
            } else {
                $location = ROOT . "/404.php";
                if(file_exists(VIEW . $four0four_dir. "/" . $four0four . ".php")){
                    echo $contents = file_get_contents(VIEW . $four0four_dir. "/" . $four0four . ".php");
                }
                $dt = new DateTime();
                $userIp = $_SERVER['REMOTE_ADDR'];
                // The new person to add to the file
                $file = "IP ADDRESS : " . $userIp . " DATE ACCESSED : " . $dt->format('d-m-Y H:i:s') . " Path Accessed : " . $currentPath . "\n";
                file_put_contents($location, $file, FILE_APPEND);
            }

        }
    }
    // returns true if $needle is a substring of $haystack

    function setRoute($mode = null, $fileName, $options = array())
    {
        $this->fileName = $fileName;
        $this->options = $options;

        $defaults =
            [
                //TODO finish working on the setRoute array
                //TODO with or without html, head, or body;
                "name" => "",
                "method" => "",
                "dir" => "",
                "mode" => "",
                "noHeader" => ""
            ];

        $config = array_merge($defaults, $options);

        if ($config['name']) {
            //TODO create an option filed
//            echo $config['name'];
        }

        $noHeader =$config['name'];


        $currentPath = trim($_SERVER["REQUEST_URI"]);
        $piecesExploded = explode("/", $currentPath);
//        $checkAssignmentError = end($piecesExploded) === $fileName ? 1 : 0;

        $Directory = new RecursiveDirectoryIterator(VIEW);
        $Iterator = new RecursiveIteratorIterator($Directory);
        $Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
        $this->Regex = $Regex ;

        foreach ($Regex as $name => $object) {
            foreach ($object as $key => $value) {
                $fileNameWithExtension = list($ListOfFileNames) = basename($value);
                $stripExtension = "" . strstr($fileNameWithExtension, ".", true);
                $this->strippedNames = $stripExtension;

                    if ($this->contains($fileName, $stripExtension) == true) {

//                    $fileNameWithExtension = basename($fileName);
//                    echo $contents = file_get_contents(VIEW . "$fileNameWithExtension");
                        switch ($mode) {
                            case "strict":
                                $piecesFromPath = explode("/", $currentPath);
                                $checkAssignment = (end($piecesFromPath) === $fileName ? true : false);
                                $_SESSION["mode"]="strict";
                                break;
                            case "moderate":
                                $checkAssignment = $this->contains($fileName, $currentPath);
                                $_SESSION["mode"]="moderate";
                                break;
                            default:
                                $piecesFromPath = explode("/", $currentPath);
                                $checkAssignment = end($piecesFromPath) === $fileName;
                                $_SESSION["mode"]="default";

                                break;
                        }
                        if ($checkAssignment === true) {
                            $this->type = $_SESSION["mode"];

                            if(file_exists(VIEW . $config['dir'] . "/" . $fileNameWithExtension)){
                                return $contents = include_once(VIEW . $config['dir'] . "/" . $fileNameWithExtension);
                            }else{
                                return $contents = file_get_contents(VIEW . $this->four0four_dir. "/" . $this->four0four . ".php");

                            }

                        }else{
                            //DO NOTHING
                        }
                    }

            }
        }

    }

    function contains($needle, $haystack)
    {
        if(!empty($needle)){


        return strpos($haystack, $needle) !== false;
        }
    }

    function view(){
//        echo $this->setRoute($this->mode, $this->fileName, $this->options = array());
    }

    function noHeader(){

        //TODO make it so that you dont have to use the default header.php rather set whether to use the current page header
    }



}

?>