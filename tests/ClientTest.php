<?php

namespace TelegramBotSDK\Test;

use Closure;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;
use TelegramBotSDK\BadMethodCallException;
use TelegramBotSDK\Client;
use TelegramBotSDK\Enum\ChatType;
use TelegramBotSDK\Events\EventCollection;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Types\Inline\InlineQuery;
use TelegramBotSDK\Types\Message;
use TelegramBotSDK\Types\Update;

class ClientTest extends TestCase
{
    /**
     * @throws InvalidArgumentException
     */
    public function data(): array
    {
        return [
            [
                Update::fromResponse([
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
                ]),
                'testText',
                null,
                null,
            ],
            [
                Update::fromResponse([
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
                ]),
                'testcommand',
                null,
                null,
            ],
            [
                Update::fromResponse([
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
                ]),
                'testcommand',
                'with',
                'attrs',
            ],
            [
                Update::fromResponse([
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

                ]),
                'testcommand',
                null,
                null,
            ],
        ];
    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetInlineQueryChecker(Update $update)
    {
        $reflectionMethod = new ReflectionMethod(Client::class, 'getInlineQueryChecker');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke(null);

        $this->assertInstanceOf(Closure::class, $result);

        $this->assertEquals(!is_null($update->getInlineQuery()), call_user_func($result, $update));
    }

    public function testBadMethodCallException()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage('Method testMethod not exists');

        $item = new Client('testToken');
        $item->testMethod();
    }

    public function testOn()
    {
        $item = new Client('testToken');

        $mockedEventCollection = $this->getMockBuilder(EventCollection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockedEventCollection->expects($this->once())->method('add');

        $reflection = new ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, $mockedEventCollection);
        $reflectionProperty->setAccessible(false);

        $this->assertSame($item, $item->on(function () {
            return true;
        }));
    }

    /**
     * @param Update $update
     * @param string $command
     *
     * @dataProvider data
     */
    public function testGetChecker(Update $update, string $command)
    {
        $reflectionMethod = new ReflectionMethod(Client::class, 'getChecker');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke(null, $command);

        $this->assertInstanceOf(Closure::class, $result);

        preg_match(Client::REGEXP, $update->getMessage() ? $update->getMessage()->getText() : '', $matches);

        $expected = !empty($matches) && $matches[1] == $command;

        $this->assertEquals($expected, call_user_func($result, $update));

    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testHandle(Update $update)
    {
        $item = new Client('testToken');

        $mockedEventCollection = $this->getMockBuilder(EventCollection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockedEventCollection->expects($this->exactly(2))->method('handle');

        $reflection = new ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, $mockedEventCollection);
        $reflectionProperty->setAccessible(false);

        $item->handle([$update, $update]);

    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetEvent(Update $update, $command, $attr1, $attr2)
    {
        $reflectionMethod = new ReflectionMethod(Client::class, 'getEvent');
        $reflectionMethod->setAccessible(true);
        global $test;

        $test = 1;

        $action = function (Message $message) {
            global $test;
            $test = 2;

            return true;
        };

        if ($attr1 && $attr2) {
            $action = function (Message $message, $attr1, $attr2) {
                global $test;
                $test = 2;

                return true;
            };
        }
        $action->bind($action, $this);

        $result = $reflectionMethod->invoke(null, $action);

        $this->assertInstanceOf(Closure::class, $result);

        $mustBeCalled = !is_null($update->getMessage());

        $this->assertEquals(!$mustBeCalled, call_user_func($result, $update));

        if ($mustBeCalled) {
            $this->assertEquals(2, $test);
        } else {
            $this->assertEquals(1, $test);
        }
    }

    /**
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetInlineQueryEvent(Update $update)
    {
        $reflectionMethod = new ReflectionMethod(Client::class, 'getInlineQueryEvent');
        $reflectionMethod->setAccessible(true);
        global $test;

        $test = 1;

        $action = function (InlineQuery $query) {
            global $test;
            $test = 2;

            return true;
        };

        $action->bind($action, $this);

        $result = $reflectionMethod->invoke(null, $action);

        $this->assertInstanceOf(Closure::class, $result);

        $mustBeCalled = !is_null($update->getInlineQuery());

        $this->assertEquals(!$mustBeCalled, call_user_func($result, $update));

        if ($mustBeCalled) {
            $this->assertEquals(2, $test);
        } else {
            $this->assertEquals(1, $test);
        }
    }
}
