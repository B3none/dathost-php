<?php

namespace B3none\DatHost\Categories;

class DomainsCategory extends BaseCategory
{
	/**
	 * Get custom domains
	 *
	 * @return array
	 */
	public function getCustomDomains(): array
	{
		$response = $this->guzzle->get('/custom-domains');

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
