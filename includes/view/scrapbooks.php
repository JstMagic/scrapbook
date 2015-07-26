<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 22/05/2015
 * Time: 11:33
 */
?>
<div class="container-fluid">
    <? include_once 'sidebar.php';

    $page = $_GET['page'];

    switch($page){

        case "events":
            echo "<H1> hello</H1>";
            $file = 'pages/events.php';
            break;
        case "planners":
            $file = 'pages/planners.php';
            break;
        case "groups" :
            $file = 'pages/groups.php';
            break;
        case "messages" :
            $file = 'pages/messages.php';
            break;
        case 'contacts' :
            $file = 'pages/contacts.php';
            break;
        case 'logs' :
            $file = 'pages/logs.php';
            break;
        default :
            $file = 'rightSidebar.php';
            break;
    }
    include_once $file?>
</div>
<? include_once 'fixedMenus.php' ?>
