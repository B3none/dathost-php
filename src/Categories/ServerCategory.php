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
			'form_params' => $serverDetails,
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
			'form_params' => $serverDetails,
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

	/**
	 * Send a line of text to the server console
	 *
	 * @param string $serverId
	 * @param string $command
	 * @return array
	 */
	public function sendConsoleCommand(string $serverId, string $command): array
	{
		$response = $this->guzzle->post("/game-servers/$serverId/console", [
			'form_params' => [
				'line' => $command,
			],
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Duplicate a server (copies settings and files to a new server)
	 *
	 * @param string $serverId
	 * @return array
	 */
	public function duplicateServer(string $serverId): array
	{
		$response = $this->guzzle->post("/game-servers/$serverId/duplicate");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * List files on gameserver
	 *
	 * @param string $serverId
	 * @param array $queryData
	 * @return array
	 */
	public function getServerFiles(string $serverId, array $queryData): array
	{
		$response = $this->guzzle->post("/game-servers/$serverId/files", [
			'query' => $queryData,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Delete a file/directory from the gameserver
	 *
	 * @param string $serverId
	 * @param string $path
	 * @return array
	 */
	public function deleteServerFile(string $serverId, string $path): array
	{
		$response = $this->guzzle->delete("/game-servers/$serverId/files/$path");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Download a file from the gameserver
	 *
	 * @param string $serverId
	 * @param string $path
	 * @param array $queryData
	 * @return array
	 */
	public function getServerFile(string $serverId, string $path, array $queryData): array
	{
		$response = $this->guzzle->get("/game-servers/$serverId/files/$path", [
			'query' => $queryData,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Upload a file to the gameserver
	 *
	 * @param string $serverId
	 * @param string $path
	 * @param array $formData
	 * @return array
	 */
	public function uploadServerFile(string $serverId, string $path, array $formData): array
	{
		$response = $this->guzzle->post("/game-servers/$serverId/files/$path", [
			'form_data' => $formData,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Move a file/directory on the gameserver
	 *
	 * @param string $serverId
	 * @param string $path
	 * @param array $formData
	 * @return array
	 */
	public function moveServerFile(string $serverId, string $path, array $formData): array
	{
		$response = $this->guzzle->put("/game-servers/$serverId/files/$path", [
			'form_data' => $formData,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Get server metrics
	 *
	 * @param string $serverId
	 * @return array
	 */
	public function getServerMetrics(string $serverId): array
	{
		$response = $this->guzzle->get("/game-servers/$serverId/metrics");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Generate a new FTP password
	 *
	 * @param string $serverId
	 * @return array
	 */
	public function generateFtpPassword(string $serverId): array
	{
		$response = $this->guzzle->post("/game-servers/$serverId/regenerate-ftp-password");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Reset all file changes and settings
	 *
	 * @param string $serverId
	 * @return array
	 */
	public function resetServer(string $serverId): array
	{
		$response = $this->guzzle->post("/game-servers/$serverId/reset");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
