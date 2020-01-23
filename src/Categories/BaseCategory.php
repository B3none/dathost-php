<?php

namespace B3none\DatHost\Categories;

use GuzzleHttp\Client as Guzzle;

class BaseCategory
{
    /**
     * @var Guzzle
     */
    protected $guzzle;

    /**
     * BaseCategory constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->guzzle = new Guzzle([
            'base_url' => 'https://dathost.net/api/0.1/',
            'auth' => [
                'username' => $username,
                'password' => $password,
            ],
        ]);
    }
}
