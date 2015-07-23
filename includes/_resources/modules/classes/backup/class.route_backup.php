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

            /*$arrayV = array_values($TruelyFound);
            $finalTruelyFound = $arrayV[0];*/

            $checkAssignmentError = end($piecesExploded) === "" ? 0 : 1;
            $checkAssignmentDefault = end($piecesExploded) === $default ? 1 : 0;

        if(in_array($host,$basename)){
            $hostFinal = $host;
            $hostFinalCount = strlen($hostFinal);
        }else{
            $hostFinal = "";
            $hostCount = strlen($host);
        }

        echo "in aeay ".$hostFinalCount."<br>";
        echo "not in aeay ".$hostCount;




        if (!empty($default) && $checkAssignmentDefault === 0 && $checkAssignmentError === 0 && $finalTrueFalse === 0) {
            echo $contents = file_get_contents(VIEW . $config['dir'] . "/" . $default . ".php");


        }
        elseif(empty(trim($hostFinal)) && $hostFinalCount < $hostCount){

        }
        elseif(in_array($host,$basename) && (empty(trim($hostFinal)) && $hostFinalCount < $hostCount) ) {

            if (!file_exists(ROOT . '/404.php')) {
                $ff = fopen(ROOT . '/404.php', "w");
                fclose($ff);
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
    // returns true if $needle is a substring of $haystack

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
                                break;
                            case "moderate":
                                $checkAssignment = $this->contains($fileName, $currentPath);
                                break;
                            default:
                                $piecesFromPath = explode("/", $currentPath);
                                $checkAssignment = end($piecesFromPath) === $fileName;

                                break;
                        }
                        if ($checkAssignment === true) {
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

//$route = new routes();

//print_r($reroute = $route->setRoute("moderate","phones"));
?>