<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 10/06/2015
 * Time: 15:03
 */

?>
<div class="leftColumn">

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
                        </li>
                    </ul>
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

            </div>
        </script>

    </div>
</div>
