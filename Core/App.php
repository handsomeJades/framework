<?php
/**
 * Created by PhpStorm.
 * User: shitingyu
 * Date: 2019/4/19
 * Time: 14:40
 */
require_once 'Route.php';

class App
{
    public function __construct()
    {

    }

    public function run()
    {
        Route::dispatch();
    }
}