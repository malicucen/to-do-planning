<?php

namespace App\TaskProviders\Traits;

use GuzzleHttp\Exception\GuzzleException;

trait HasJsonAPI
{
    public function doRequest(string $url): array
    {
        try {
            $response = $this->client->get($url);
        } catch (\Exception|GuzzleException $exception) {
            logger()->error($exception);

            throw new \RuntimeException('Something went wrong while getting tasks.');
        }

        $rawTasks = $response->getBody()->getContents();

        if (!json_validate($rawTasks)) {
            throw new \RuntimeException('The task list is not in the expected format.');
        }

        return json_decode($rawTasks, true, 512, JSON_THROW_ON_ERROR);
    }
}
