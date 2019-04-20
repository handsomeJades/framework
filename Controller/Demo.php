<?php

class demo extends Controller
{
    public function index()
    {
//        $userC=Component::make('User');
//        $name=$userC->getName();
//        echo $name;

        $carUserC = Component::make('Car\User');
        echo $carUserC->getCarUser('Kate');

        $carUserC = Component::make('Car\User');
        echo $carUserC->getCarUser();
    }

    public function start()
    {
        echo __FUNCTION__;
        exit;
    }
}