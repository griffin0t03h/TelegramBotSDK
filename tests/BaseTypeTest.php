<?php

namespace TelegramBotSDK\Test;

use PHPUnit\Framework\TestCase;
use TelegramBotSDK\BaseType;
use TelegramBotSDK\InvalidArgumentException;

class BaseTypeTest extends TestCase
{
    public function testValidate()
    {
        $this->assertTrue(TestBaseType::validate(['test1' => 1, 'test2' => 2, 'test3' => 3]));
    }

    public function testValidateFail()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->assertTrue(TestBaseType::validate(['test1' => 1]));
    }
}

class TestBaseType extends BaseType
{
    protected static array $requiredParams = ['test1', 'test2'];
}
