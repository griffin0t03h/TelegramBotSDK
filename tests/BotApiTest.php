<?php

namespace TelegramBotSDK\Test;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Api\BotApi;
use TelegramBotSDK\Enum\ChatType;
use TelegramBotSDK\Exception;
use TelegramBotSDK\Http\HttpClientInterface;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Types\ArrayOfUpdates;
use TelegramBotSDK\Types\Update;

class BotApiTest extends TestCase
{
    public static function data(): array
    {
        return [
            [
                [
                    [
                        'update_id' => 123456,
                        'message' => [
                            'message_id' => 13948,
                            'from' => [
                                'id' => 123,
                                'is_bot' => false,
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                                'username' => 'griffin0t03h',
                            ],
                            'chat' => [
                                'id' => 123,
                                'type' => ChatType::Private->value,
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                                'username' => 'griffin0t03h',
                            ],
                            'date' => 1440169809,
                            'text' => 'testText',
                        ],
                    ],
                    [
                        'update_id' => 123456,
                        'message' => [
                            'message_id' => 13948,
                            'from' => [
                                'id' => 123,
                                'is_bot' => false,
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                                'username' => 'griffin0t03h',
                            ],
                            'chat' => [
                                'id' => 123,
                                'type' => ChatType::Private->value,
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                                'username' => 'griffin0t03h',
                            ],
                            'date' => 1440169809,
                            'text' => '/testcommand',
                        ],
                    ],
                    [
                        'update_id' => 376262206,
                        'inline_query' => [
                            'id' => '248571229377660054',
                            'from' => [
                                'id' => 123,
                                'is_bot' => false,
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                                'username' => 'griffin0t03h',
                            ],
                            'query' => 'h g',
                            'offset' => '',
                        ],

                    ],
                ],
            ],
            [
                [
                    [
                        'update_id' => 123456,
                        'message' => [
                            'message_id' => 13948,
                            'from' => [
                                'id' => 123,
                                'is_bot' => false,
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                                'username' => 'griffin0t03h',
                            ],
                            'chat' => [
                                'id' => 123,
                                'type' => ChatType::Private->value,
                                'first_name' => 'Griffin T-3H',
                                'last_name' => 'Team',
                                'username' => 'griffin0t03h',
                            ],
                            'date' => 1440169809,
                            'text' => '/testcommand with attrs',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @param Update[] $updates
     *
     * @throws Exception|InvalidArgumentException|\PHPUnit\Framework\MockObject\Exception
     *
     * @dataProvider data
     */
    public function testGetUpdates(array $updates)
    {
        $httpClient = $this->createHttpClient();
        $botApi = $this->createBotApi($httpClient);

        $httpClient
            ->expects($this->once())
            ->method('request')
            ->willReturn($updates);

        $result = $botApi->getUpdateService()->getUpdates();

        $expectedResult = ArrayOfUpdates::fromResponse($updates);

        $this->assertEquals($expectedResult, $result);

        foreach ($result as $key => $item) {
            $this->assertInstanceOf(Update::class, $item);
            $this->assertEquals($expectedResult[$key], $item);
        }
    }

    /**
     * @return HttpClientInterface&MockObject
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    private function createHttpClient(): HttpClientInterface&MockObject
    {
        return $this->createMock(HttpClientInterface::class);
    }

    private function createBotApi(HttpClientInterface $httpClient): BotApi
    {
        return new BotApi('token', $httpClient);
    }
}
