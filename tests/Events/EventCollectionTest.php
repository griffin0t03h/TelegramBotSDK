<?php

namespace TelegramBotSDK\Test\Events;

use Closure;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use TelegramBotSDK\Events\Event;
use TelegramBotSDK\Events\EventCollection;
use TelegramBotSDK\Types\Update;

class EventCollectionTest extends TestCase
{
    public function data(): array
    {
        return [
            [
                function ($update) {
                    return false;
                },
                function ($update) {
                    return true;
                },
                Update::fromResponse([
                    'update_id' => 123456,
                    'message' => [
                        'message_id' => 13948,
                        'from' => [
                            'id' => 123,
                            'is_bot' => false,
                            'username' => 'griffin0t03h',
                            'first_name' => 'Griffin T-3H',
                            'last_name' => 'Team',
                        ],
                        'chat' => [
                            'id' => 123,
                            'type' => 'private',
                            'is_bot' => false,
                            'username' => 'griffin0t03h',
                            'first_name' => 'Griffin T-3H',
                            'last_name' => 'Team',
                        ],
                        'date' => 1440169809,
                        'text' => 'testText',
                    ],
                ]),
            ],
        ];
    }

    /**
     * @param Closure $action
     * @param Closure $checker
     *
     * @dataProvider data
     */
    public function testAdd1($action, $checker)
    {
        $item = new EventCollection();
        $item->add($action, $checker);

        $reflection = new ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $innerItem = $reflectionProperty->getValue($item);
        $reflectionProperty->setAccessible(false);

        $this->assertIsArray($innerItem);
        /* @var Event $event */
        foreach ($innerItem as $event) {
            $this->assertInstanceOf(Event::class, $event);
        }
    }

    /**
     * @param Closure $action
     *
     * @dataProvider data
     */
    public function testAdd2($action)
    {
        $item = new EventCollection();
        $item->add($action);

        $reflection = new ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $innerItem = $reflectionProperty->getValue($item);
        $reflectionProperty->setAccessible(false);

        $this->assertIsArray($innerItem);
        /* @var Event $event */
        foreach ($innerItem as $event) {
            $this->assertInstanceOf(Event::class, $event);
        }
    }

    /**
     * @param Closure $action
     * @param Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testHandle2($action, $checker, $update)
    {
        $item = new EventCollection();
        $name = 'test';
        $item->add($action, function ($update) use ($name) {
            return true;
        });

        $mockedEvent = $this->getMockBuilder(Event::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Configure the stub.
        $mockedEvent->expects($this->once())->method('executeChecker')->willReturn(true);
        $mockedEvent->expects($this->once())->method('executeAction')->willReturn(true);

        $reflection = new ReflectionClass($item);
        $reflectionProperty = $reflection->getProperty('events');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($item, [$mockedEvent]);
        $reflectionProperty->setAccessible(false);

        $item->handle($update);
    }

}
