<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 26/07/2015
 * Time: 16:34
 */

namespace Contact_PreRelease;

/**
 * Class contact_module
 * @package Contact_PreRelease
 */
class contact_module {
    protected $addContactModule;

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
            $html  = ('<div class="rightColumn" id="rightContact" ng-controller="TypeaheadCtrl" style="margin-top: 2%;">');
            $html .= ('<div class="row rowContacts" id = "bindPlanner">');
            $html .= ('<div class="col-md-8">');
            $html .= ('<div class="col-md-8">');
            $html .= ('<div class="addContactList">');
            $html .= ('<script type="text/ng-template" id="customTemplate.html">');
            $html .= ('<a>');
            $html .= ('<img ng-src="http://upload.wikimedia.org/wikipedia/commons/thumb/{{match.model.flag}}" width="16">');
            $html .= ('<span bind-html-unsafe="match.label | typeaheadHighlight:query"></span>');
            $html .= ('</a>');
            $html .= ('</script>');
            $html .= ('<div class="container-fluid">');
            $html .= ('<h1>Add New Contact</h1><br>');
            $name  = ('<input type="text" ng-model="FirstName" placeholder="First Name" typeahead=" Fname for Fname in names | filter:$viewValue | limitTo:8" class="form-control">');
            $lname = ('<input type="text" ng-model="LastName"  placeholder="Last Name" typeahead="  Lname for Lname in names | filter:$viewValue | limitTo:8" class="form-control">');
            $dob   = ('<input type="datetime" ng-model="D.O.B" placeholder="D.O.B" class="form-control">');
            $email = ('<input type="email" ng-model="Email" placeholder="@ Address" class="form-control">');
            $phone = ('<input type="number" ng-model="Tel" placeholder="Telephone Number" class="form-control">');
            $note  = ('<input type="text" ng-model="Note" placeholder="Note" class="form-control">');
            $location =('<input type="text" ng-model="asyncSelected" placeholder="Person Location" typeahead="address for address in getLocation($viewValue)" typeahead-loading="loadingLocations" class="form-control">        ');
            $button  = ('<i ng-show="loadingLocations" class="glyphicon glyphicon-refresh"></i>');
            $div     = ('</div>');
            $div    .= ('</div>');
            $div    .= ('</div>');
            $div    .= ('</div>');
            $div    .= ('</div>');

        }elseif($option === 'edit'){
            $html  = ('<div class="rightColumn" id="rightContact" ng-controller="TypeaheadCtrl" style="margin-top: 2%;">');
            $html .= ('<div class="row rowContacts" id = "bindPlanner">');
            $html .= ('<div class="col-md-8">');
            $html .= ('<div class="col-md-8">');
            $html .= ('<div class="addContactList">');
            $html .= ('<script type="text/ng-template" id="customTemplate.html">');
            $html .= ('<a>');
            $html .= ('<img ng-src="http://upload.wikimedia.org/wikipedia/commons/thumb/{{match.model.flag}}" width="16">');
            $html .= ('<span bind-html-unsafe="match.label | typeaheadHighlight:query"></span>');
            $html .= ('</a>');
            $html .= ('</script>');
            $html .= ('<div class="container-fluid">');
            $html .= ('<h1>Add New Contact</h1><br>');
            $name  = ('<input type="text" ng-model="FirstName" placeholder="First Name" typeahead=" Fname for Fname in names | filter:$viewValue | limitTo:8" class="form-control">');
            $lname = ('<input type="text" ng-model="LastName"  placeholder="Last Name" typeahead="  Lname for Lname in names | filter:$viewValue | limitTo:8" class="form-control">');
            $dob   = ('<input type="datetime" ng-model="D.O.B" placeholder="D.O.B" class="form-control">');
            $email = ('<input type="email" ng-model="Email" placeholder="@ Address" class="form-control">');
            $phone = ('<input type="number" ng-model="Tel" placeholder="Telephone Number" class="form-control">');
            $note  = ('<input type="text" ng-model="Note" placeholder="Note" class="form-control">');
            $location =('<input type="text" ng-model="asyncSelected" placeholder="Person Location" typeahead="address for address in getLocation($viewValue)" typeahead-loading="loadingLocations" class="form-control">        ');
            $button  = ('<i ng-show="loadingLocations" class="glyphicon glyphicon-refresh"></i>');
            $div     = ('</div>');
            $div    .= ('</div>');
            $div    .= ('</div>');
            $div    .= ('</div>');
            $div    .= ('</div>');
        }else{

            $html= "hello";
        }
        $result = $html.$name.$lname.$dob.$email.$phone.$note.$location.$button.$div;
        $this->addContactModule = $result;
        return $result;

    }

    public function addContact(){
        return $this->addContactModule;
    }

}
$contactObj = new contact_module();
echo $me = $contactObj->contact("s","df");

