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
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * Create an instance of the DatHost Client.
     *
     * @param string $username
     * @param string $password
     * @return Client
     */
    public static function create(string $username, string $password)
    {
        return new self($username, $password);
    }


    /**
     * Client constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get endpoints for the Account category.
     */
    public function account(): AccountCategory
    {
        return new AccountCategory($this->username, $this->password);
    }

    /**
     * Get endpoints for the Domains category.
     */
    public function domains(): DomainsCategory
    {
        return new DomainsCategory($this->username, $this->password);
    }

    /**
     * Get endpoints for the Server category.
     */
    public function server(): ServerCategory
    {
        return new ServerCategory($this->username, $this->password);
    }

    /**
     * Get endpoints for the Servers category.
     */
    public function servers(): ServersCategory
    {
        return new ServersCategory($this->username, $this->password);
    }
}
