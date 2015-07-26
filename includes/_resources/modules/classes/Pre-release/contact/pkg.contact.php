<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 26/07/2015
 * Time: 16:34
 */

namespace Contact_PreRelease;

/**
 * Class assign_resources
 * @package contact
 */
class contact {

    /**
     *
     */
    public function __construct(){

    }

    /**
     * @param $title
     * @param array $info
     */
    public function contact($title, $info = []){

        $option = (isset($_GET['add']) ? 'add'  : 'edit');

        if($option === 'add') {
            $html = htmlentities('<div class="rightColumn" id="rightContact" ng-controller="TypeaheadCtrl" style="margin-top: 2%;">');
            $html = htmlentities('<div class="row rowContacts" id = "bindPlanner">');
            $html = htmlentities('<div class="col-md-8">');
            $html = htmlentities('<div class="col-md-8">');
        }elseif($option === 'edit'){

        }else{

        }


    }

}