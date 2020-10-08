<?php

class Requester
{
    private string $URL;

    public function __construct(string $URL = 'https://api.agify.io')
    {
        $this->URL = $URL;
    }

    public function makeRequest(string $name)
    {
        $response = file_get_contents($this->URL . '?name=' . $_GET['name']);
        return json_decode($response, true);
    }
}