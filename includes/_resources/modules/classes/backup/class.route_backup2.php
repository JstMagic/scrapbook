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
    protected $mode;
    protected $fileName;
    protected $Regex;
    protected $strippedNames;
    protected $baseName;
    protected $type;

    function __constructor()
    {

    }

    function setDefault($options = array())
    {

        $fileN = $this->fileName;
        $ThisFiles = $this->Regex;
        $this->baseName=$basename = array();
        $TrueFalse = array();

        $defaults = [
            "dir" => "",
            "defaultPage" => ""
        ];

        $currentPath = trim($_SERVER["REQUEST_URI"]);
        $piecesExploded = explode("/", $currentPath);

        $host = trim(end($piecesExploded));
        $hostUrl = implode(" ", $piecesExploded);

        $config = array_merge($defaults, $options);

        $default = trim($config['defaultPage']);

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
            echo $contents = file_get_contents(VIEW . $config['dir'] . "/" . $default . ".php");

        }elseif(!in_array($host,$basename) && $this->type != "moderate") {
            if (!file_exists(ROOT . '/404.php')) {
                $f = fopen(ROOT . '/404.php', "w");
                fclose($f);
            } else {
                $location = ROOT . '/404.php';
                echo $contents = file_get_contents(VIEW . "errors" . "/" . "404.php");
                $dt = new DateTime();
                $userIp = $_SERVER['REMOTE_ADDR'];
                // The new person to add to the file
                $file = "IP ADDRESS : " . $userIp . " DATE ACCESSED : " . $dt->format('Y-m-d H:i:s') . " Path Accessed : " . $currentPath . "\n";
                file_put_contents($location, $file, FILE_APPEND);
            }

        }
    }

    /**
     * @param null $mode set how different links are handled if moderate,
     * strict or leave blank for default, moderate links will have e.g original link index.php/homepage would work and also index.php/homepagesfda would also work, technically anything after the homepage will work
     * @param $fileName
     * @param array $options
     */
    function setRoute($mode = null, $fileName, $options = array())
    {
        $this->fileName = $fileName;

        $defaults =
            [
                //TODO finish working on the setRoute array
                //TODO with or without html, head, or body;
                "name" => "",
                "method" => "",
                "dir" => "",
                "mode" => "",
                "defaultPage" =>""
            ];

        $config = array_merge($defaults, $options);

        if ($config['name']) {
            //TODO create an option filed
            echo $config['name'];
        }

        /*if(!empty($mode)){
            $mode = "";
        }*/
        $currentPath = trim($_SERVER["REQUEST_URI"]);
        $piecesExploded = explode("/", $currentPath);

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
                        echo $contents = file_get_contents(VIEW . $config['dir'] . "/" . $fileNameWithExtension);
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
}
