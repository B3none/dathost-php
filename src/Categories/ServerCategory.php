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

	/**
	 * Update server details
	 *
	 * @param string $serverId
	 * @param array $serverDetails
	 * @return array
	 */
	public function updateServer(string $serverId, array $serverDetails): array
	{
		$response = $this->guzzle->put("/game-servers/$serverId", [
			'body' => $serverDetails,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * List all available backups for this server
	 *
	 * @param string $serverId
	 * @return array
	 */
	public function getServerBackups(string $serverId): array
	{
		$response = $this->guzzle->get("/game-servers/$serverId/backups");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Restore all files from a backup
	 *
	 * @param string $serverId
	 * @param string $backupName
	 * @return array
	 */
	public function restoreServerBackup(string $serverId, string $backupName): array
	{
		$response = $this->guzzle->post("/game-servers/$serverId/backups/$backupName/restore");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Get the last lines of backlog from the server console
	 *
	 * @param string $serverId
	 * @param int $maxLines
	 * @return array
	 */
	public function getServerConsole(string $serverId, int $maxLines = 1000): array
	{
		$response = $this->guzzle->get("/game-servers/$serverId", [
			'query' => [
				'max_lines' => $maxLines,
			],
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
