<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Google {

    protected $client;

    protected $service;

    function __construct() {
        /* Get config variables */
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key = Config::get('google.api_key');//you can use later

        $this->client = new \Google_Client();
        $this->client->setApplicationName("drive");
        $this->service = new \Google_Service_Books($this->client);//Test with Books Service        
    }

    public function getBooks(){
        $optParams = array('filter' => 'free-ebooks');
        $results = $this->service->volumes->listVolumes('Henry David Thoreau', $optParams);

        dd($results);
    }
}