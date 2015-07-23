<?php

/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 19/05/2015
 * Time: 15:22
 */

interface people{

    public function __construct();

    /**
     * @param $firstName create of the the new person you are trying to create
     * @param $lastName create last name of the person you are trying to create
     * @param $emailAddr create email address of the person you are trying to crea
     * @return mixed
     */
    function createPerson($firstName, $lastName, $emailAddr);


    /**
     * @param $taskName create the name of the task such as events, occasions etc.
     * @param $taskDescription create the decription of the event you are trying to create. e.g Wedding anniversary, birthday
     * @return mixed
     */
    function createTask($taskName, $taskDescription);


    /**
     * @param $phoneName create the name of the phone, this can be what ever name you want, used to refer to this phone
     * @param $phoneMake create the phone make e.g if the phone make was Samsungs, Android, Iphone
     * @param $phoneModel create the phone model e.g S5, Iphone 4s
     * @param $phoneDescription create give this phone a description, this can be anything, e.g was giving to me on christmas
     * @param $personId create the current user who wants to create the phone
     * @return mixed
     */
    function createPhone($phoneName, $phoneMake, $phoneModel, $phoneDescription, $personId);


    /**
     * @param $scrapBookName create name of the scrapbook
     * @param $scrapBookTitle create scrapbook title
     * @param $scrapBookDescription create scrapbook description
     * @param $scrapBookImage create scrapbook Image cover
     * @return mixed
     */
    function createScrapbook($scrapBookName, $scrapBookTitle, $scrapBookDescription, $scrapBookImage);


}
