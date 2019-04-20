<?php

class Controller
{
    public function pr($data)
    {
        print_r($data);
        exit;
    }

    public function formatData($status, $data)
    {
        $response['status'] = $status;
        $response['data'] = $data;
        echo json_encode($response);
        exit;
    }

}