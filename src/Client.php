<?php

namespace B3none\DatHost;

use B3none\DatHost\Categories\AccountCategory;
use B3none\DatHost\Categories\DomainsCategory;
use B3none\DatHost\Categories\ServerCategory;
use B3none\DatHost\Categories\ServersCategory;

class Client
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * Create an instance of the DatHost Client.
     *
     * @param string $apiKey
     * @return Client
     */
    public static function create(string $apiKey)
    {
        return new self($apiKey);
    }


    /**
     * Client constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get endpoints for the Account category.
     */
    public function account(): AccountCategory
    {
        return new AccountCategory();
    }

    /**
     * Get endpoints for the Domains category.
     */
    public function domains(): DomainsCategory
    {
        return new DomainsCategory();
    }

    /**
     * Get endpoints for the Server category.
     */
    public function server(): ServerCategory
    {
        return new ServerCategory();
    }

    /**
     * Get endpoints for the Servers category.
     */
    public function servers(): ServersCategory
    {
        return new ServersCategory();
    }
}
