<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/05/2015
 * Time: 10:52
 */
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include_once "dirNames.php";
include ENTITIES.FILE_ROUTE;
include DATABASE."/db.settings.php";
include_once ROOT."/app.autoloader.php";



//$streamline->getInfo();

/*$stmt= $exec->prepare("INSERT INTO person (firstname,lastname,email) VALUE (?, ?, ?) ");
$stmt->bindParam("1",$firstname);
$stmt->bindParam("2",$lastname);
$stmt->bindParam("3",$emailAddr);

$firstname = 'Jeery'; $lastname = 'Jar'; $emailAddr = 'benreece@email.com';*/

//$stmt->execute();







