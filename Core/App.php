<?php

require_once 'Route.php';

class App
{
    public function __construct()
    {

    }

    /**
     * 运行应用程序
     */
    public function run()
    {
        Route::dispatch();
    }
}