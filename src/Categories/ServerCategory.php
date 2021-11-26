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

	/**
	 * Delete a server
	 *
	 * @param string $serverId
	 * @return array
	 */
	public function deleteServer(string $serverId): array
	{
		$response = $this->guzzle->delete("/game-servers/$serverId");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Get all info about one gameserver
	 *
	 * @param string $serverId
	 * @return array
	 */
	public function getServer(string $serverId): array
	{
		$response = $this->guzzle->get("/game-servers/$serverId");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
