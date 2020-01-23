<?php

use B3none\DatHost\Client;

require('vendor/autoload.php');

$client = Client::create('api-key');

$client->account();
