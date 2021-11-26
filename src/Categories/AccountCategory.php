<?php

namespace B3none\DatHost\Categories;

class AccountCategory extends BaseCategory
{
	/**
	 * Get info about the account
	 *
	 * @return array
	 */
    public function getAccount(): array
    {
		$response = $this->guzzle->get('/account');

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
    }
}
