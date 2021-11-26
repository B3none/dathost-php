<?php

namespace B3none\DatHost\Categories;

class ServersCategory extends BaseCategory
{
	/**
	 * Get a list of non-deleted game servers
	 *
	 * @return array
	 */
	public function getServers(): array
	{
		$response = $this->guzzle->get('/game-servers');

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
