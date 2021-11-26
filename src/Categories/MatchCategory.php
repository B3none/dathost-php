<?php

namespace B3none\DatHost\Categories;

class MatchCategory extends BaseCategory
{
	/**
	 * Start a match
	 *
	 * @param array $formData
	 * @return array
	 */
	public function startMatch(array $formData): array
	{
		$response = $this->guzzle->post('/matches', [
			'form_params' => $formData,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Get all info about one match
	 *
	 * @param string $matchId
	 * @return array
	 */
	public function getMatchSeries(string $matchId): array
	{
		$response = $this->guzzle->get("/matches/$matchId");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
