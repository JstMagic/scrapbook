<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 10/06/2015
 * Time: 15:03
 */

?>
<div class="leftColumn">
    <div class="rowOne floatLeft">
        <div class="user-header">
            <ul>
                <li><img src="http://www.writells.com/users/profile/m.onyesom@gmail.com/imgs/20141005_131815[2].jpg">
                </li>
            </ul>
        </div>
    </div>

    <div class="rowTwo floatleft">
        <div id="tabs" ng-controller="TabsCtrl1">
            <ul>
                <li ng-repeat="tab in tabs"
                    ng-class="{active:isActiveTab(tab.url)}"
                    ng-click="onClickTab(tab)">{{tab.title}}
                </li>
            </ul>
            <div id="mainView">
                <div ng-include="currentTab"></div>
            </div>
        </div>
        <script type="text/ng-template" id="contacts.tpl.html">
            <div id="viewOne">
                <div class="addInput">
                    <ul><li>
                            <img src="/img/scrapbook/add_contact.png">
                        </li></ul>
                </div>
                <ul>
                    <li>
                        <h1><a href="">John Reece</a></h1>
                        <p>Who said life wasn't fun enough...</p>
                    </li>
                    <li>
                        <h1><a href="">Peter Ropford</a></h1>
                        <p>I live to testifies.</p>
                    </li>
                    <li>
                        <h1><a href="">Joe Blender</a></h1>
                        <p>Leave me not in the hands of others</p>
                    </li>
                    <li>
                        <h1><a href="">Martha Muller</a></h1>
                        <p>What did you say last night?</p>
                    </li>
                    <li>
                        <h1><a href="">The Twins racer</a></h1>
                        <p>Are we still meeting up today?</p>
                    </li>
                </ul>
            </div>
        </script>

        <script type="text/ng-template" id="messages.tpl.html">
            <div id="viewTwo">
                <h1></h1><br>


            </div>
        </script>

        <script type="text/ng-template" id="groups.tpl.html">
            <div id="viewThree">
                <h1></h1>


            </div>
        </script>

    </div>



    <div class="rowThree floatleft">
        <div id="tabs" ng-controller="TabsCtrl2">
            <ul>
                <li ng-repeat="tab in tabs"
                    ng-class="{active:isActiveTab(tab.url)}"
                    ng-click="onClickTab(tab)">{{tab.title}}
                </li>
            </ul>
            <div id="mainGroup2">
                <div ng-include="currentTab"></div>
            </div>
        </div>
        <script type="text/ng-template" id="planner.tpl.html">
            <div id="viewOne">
                <div class="addInput">
                    <ul><li>
                            <img src="/img/scrapbook/add_contact.png">
                        </li></ul>
                </div>
                <div style="display:inline-block; min-height:290px;">
                    <datepicker ng-model="dt" min-date="minDate" show-weeks="true" class="well well-sm" custom-class="getDayClass(date, mode)"></datepicker>
                </div><br>
                <ul><li><pre><em>{{dt | date:'fullDate' }}</em></pre></li></ul>



                    <timepicker ng-model="mytime" ng-change="changed()" hour-step="hstep" minute-step="mstep" show-meridian="ismeridian"></timepicker>

                    <pre class="alert alert-info">Time is: {{mytime | date:'shortTime' }}</pre>


            </div>
        </script>

        <script type="text/ng-template" id="events.tpl.html">
            <div id="viewTwo">
                <h1></h1>


            </div>
        </script>

        <script type="text/ng-template" id="logs.tpl.html">
            <div id="viewThree">
                <h1></h1><br>

                <!--<div class="thumb">

                    <a href="#">

                        <span>Three-eyed Robot</span>
                    </a>
                </div>-->
            </div>
        </script>

    </div>
</div>
