<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/07/2015
 * Time: 01:19
 */

namespace mo_handlerHelper;


class handlerHelper
{

    public function __constructor(){

    }

    public function checkRequest($type=null,$validate=null){
        /**
         * depending on the request if it is safe return true and if not return false
         */
    }

    public function errorDisplay($message=null){

        if(!is_null($message)){
            return "<div class = 'errMessage'> $message</div>\n";
        }else{
            return "";
        }
    }

    public function dbQuery(){

    }

    /**
     * @param null $page if left blank page will automatically be loaded else load specification
     */
    /*public function magicPage($page =  null){

        $currentPath = trim($_SERVER["REQUEST_URI"]);
        $piecesFromPath = explode("/", $currentPath);
        if()        $checkAssignment = (end($piecesFromPath) === $fileName ? true : false)
    }*/
}