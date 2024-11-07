<?php

namespace Tests\TaskProviders\Traits;

use App\TaskProviders\Two\TaskProviderTwo;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\TransferException;
use App\TaskProviders\Adapters\TaskProviderTwoDataAdapter;

it('successfully performs a request', function () {
    $mock = new MockHandler([
        new Response(200, [], '{"tasks": []}'),
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    $taskProviderTwo = new TaskProviderTwo($client, new TaskProviderTwoDataAdapter());
    $result = $taskProviderTwo->doRequest('https://example.com');

    expect($result)->toBeArray();
    expect($result)->toEqual(['tasks' => []]);
});

it('throws an exception when there is a problem performing a request', function () {
    $mock = new MockHandler([
        new TransferException('Error Communicating with Server'),
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    $taskProviderTwo = new TaskProviderTwo($client, new TaskProviderTwoDataAdapter());

    $taskProviderTwo->doRequest('https://example.com');
})->throws(\RuntimeException::class, 'Something went wrong while getting tasks.');

it('throws an exception when response cannot be decoded to json', function () {
    $mock = new MockHandler([
        new Response(200, [], 'invalid json'),
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    $taskProviderTwo = new TaskProviderTwo($client, new TaskProviderTwoDataAdapter());

    $taskProviderTwo->doRequest('https://example.com');
})->throws(\RuntimeException::class, 'The task list is not in the expected format.');
