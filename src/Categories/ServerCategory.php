<?php

namespace B3none\DatHost\Categories;

class ServerCategory extends BaseCategory
{
	/**
	 * Create server
	 *
	 * @param array $serverDetails
	 * @return array
	 */
	public function createServer(array $serverDetails): array
	{
		$response = $this->guzzle->post('/game-servers', [
			'body' => $serverDetails,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
