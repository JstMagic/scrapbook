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
            $html = htmlentities('<div class="addContactList">');
            $html = htmlentities('<script type="text/ng-template" id="customTemplate.html">');
            $html = htmlentities('<a>');
            $html = htmlentities('<img ng-src="http://upload.wikimedia.org/wikipedia/commons/thumb/{{match.model.flag}}" width="16">');
            $html = htmlentities('<span bind-html-unsafe="match.label | typeaheadHighlight:query"></span>');
            $html = htmlentities('</a>');
            $html = htmlentities('</script>');
            $html = htmlentities('<div class="container-fluid">');
            $html = htmlentities('<h1>Add New Contact</h1><br>');
            $name = htmlentities('<input type="text" ng-model="FirstName" placeholder="First Name" typeahead=" Fname for Fname in names | filter:$viewValue | limitTo:8" class="form-control">');
            $lname= htmlentities('<input type="text" ng-model="LastName"  placeholder="Last Name" typeahead="  Lname for Lname in names | filter:$viewValue | limitTo:8" class="form-control">');
            $dob =  htmlentities('<input type="datetime" ng-model="D.O.B" placeholder="D.O.B" class="form-control">');
            $email =htmlentities('<input type="email" ng-model="Email" placeholder="@ Address" class="form-control">');
            $phone =htmlentities('<input type="number" ng-model="Tel" placeholder="Telephone Number" class="form-control">');
            $location =htmlentities('<input type="number" ng-model="Tel" placeholder="Telephone Number" class="form-control">');
            $note =htmlentities('<input type="text" ng-model="Note" placeholder="Note" class="form-control">');
        }elseif($option === 'edit'){

        }else{

        }


    }

}