<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 23/05/2015
 * Time: 00:59
 */

$routes = new routes();

$routes->setRoute('','test',['dir'=>'bread/crumbs']);
$routes->setRoute('moderate','welcome');
$routes->setRoute('strict','contacts',['dir'=>'info']);
$routes->setRoute('moderate','login');
$routes->setRoute('moderate','phones');
$routes->setRoute('moderate','activities');
$routes->setRoute('strict','tasks');
$routes->setRoute('moderate','projects');
$routes->setRoute('moderate','person',['setHeader'=>'true']);
$routes->setRoute('moderate','sidebar');
$routes->setRoute('moderate','scrapbooks');

$routes->setDefault([
                        'defaultDir'  => 'defaults',
                        'defaultPage' => 'default',
                        '404Dir'      => '404',
                        '404Page'     => '404_style_2'
]);


