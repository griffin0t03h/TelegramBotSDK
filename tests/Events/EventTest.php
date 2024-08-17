<?php

namespace TelegramBotSDK\Test\Events;

use Closure;
use PHPUnit\Framework\TestCase;
use TelegramBotSDK\Events\Event;
use TelegramBotSDK\Types\Update;

class EventTest extends TestCase
{
    public static function data(): array
    {
        return [
            [
                function ($update) {
                    return $update;
                },
                function ($update) {
                    return $update;
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
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testConstructor($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $this->assertInstanceOf(Event::class, $item);
    }

    /**
     * @param Closure $action
     * @param Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetAction($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $this->assertEquals($action, $item->getAction());
    }

    /**
     * @param Closure $action
     * @param Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testGetChecker($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $this->assertEquals($checker, $item->getChecker());
    }

    /**
     * @param Closure $action
     * @param Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testExecuteAction($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $result = $item->executeAction($update);

        $this->assertInstanceOf(Update::class, $result);
        $this->assertEquals($update, $result);
    }

    /**
     * @param Closure $action
     * @param Closure $checker
     * @param Update $update
     *
     * @dataProvider data
     */
    public function testExecuteCheker($action, $checker, $update)
    {
        $item = new Event($action, $checker);

        $result = $item->executeChecker($update);

        $this->assertInstanceOf(Update::class, $result);
        $this->assertEquals($update, $result);
    }

}
