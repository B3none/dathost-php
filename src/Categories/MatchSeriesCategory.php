<?php

namespace B3none\DatHost\Categories;

class MatchSeriesCategory extends BaseCategory
{
	/**
	 * Start a match series (best of 2, best of 3, best of 5)
	 *
	 * @param array $formData
	 * @return array
	 */
	public function startMatchSeries(array $formData): array
	{
		$response = $this->guzzle->post('/match-series', [
			'form_params' => $formData,
		]);

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}

	/**
	 * Get all info about one match series
	 *
	 * @param string $matchSeriesId
	 * @return array
	 */
	public function getMatchSeries(string $matchSeriesId): array
	{
		$response = $this->guzzle->get("/match-series/$matchSeriesId");

		$responseContents = $response->getBody()->getContents();

		return json_decode($responseContents, true);
	}
}
