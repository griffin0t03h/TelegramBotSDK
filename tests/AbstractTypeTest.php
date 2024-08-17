<?php

namespace TelegramBotSDK\Test;

use LogicException;
use PHPUnit\Framework\TestCase;

abstract class AbstractTypeTest extends TestCase
{
    /**
     * @return string
     */
    /*abstract*/
    public function testFromResponseMin()
    {
        $item = static::createMinInstance();

        $this->assertInstanceOf(static::getType(), $item);
        $this->assertMinItem($item);
    }

    /**
     * @return array
     */
    /*abstract*/
    public static function createMinInstance()
    {
        $class = static::getType();

        return $class::fromResponse(static::getMinResponse());
    }

    /**
     * @return LogicException|string
     */
    /*abstract*/

    protected static function getType(): LogicException|string
    {
        return new LogicException(sprintf('Method "%s:%s" must be implemented', static::class, __METHOD__));
    }

    public static function getMinResponse(): array
    {
        return [];
    }

    /**
     * @param object $item
     * @return void
     */
    abstract protected function assertMinItem($item);

    public function testFromResponseFull()
    {
        $item = static::createFullInstance();

        $this->assertInstanceOf(static::getType(), $item);
        $this->assertFullItem($item);

        $innerJson = $item->toJson();

        $this->assertIsString($innerJson);
    }

    public static function createFullInstance()
    {
        $class = static::getType();

        return $class::fromResponse(static::getFullResponse());
    }

    public static function getFullResponse(): array
    {
        return [];
    }

    /**
     * @param object $item
     * @return void
     */
    abstract protected function assertFullItem($item);
}
