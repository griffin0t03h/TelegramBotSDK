<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\User;

class UserTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'id' => 123456,
            'is_bot' => false,
            'first_name' => 'Griffin T-3H',
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'id' => 123456,
            'is_bot' => false,
            'username' => 'griffin0t03h',
            'first_name' => 'Griffin T-3H',
            'last_name' => 'Team',
            'language_code' => 'en',
            'is_premium' => false,
            'added_to_attachment_menu' => false,
            'can_join_groups' => true,
            'can_read_all_group_messages' => true,
            'supports_inline_queries' => false,
        ];
    }

    protected static function getType(): string
    {
        return User::class;
    }

    public function testSet64bitId()
    {
        $item = new User();
        $item->setId(2147483648);
        $this->assertEquals(2147483648, $item->getId());
    }

    public function testFromResponseException1()
    {
        $this->expectException(InvalidArgumentException::class);

        User::fromResponse([
            'last_name' => 'Team',
            'id' => 123456,
            'username' => 'griffin0t03h',
        ]);
    }

    public function testFromResponseException2()
    {
        $this->expectException(InvalidArgumentException::class);

        User::fromResponse([
            'username' => 'griffin0t03h',
            'first_name' => 'Griffin T-3H',
            'last_name' => 'Team',
        ]);
    }

    public function testSetAndGetFirstName()
    {
        $item = new User();
        $item->setFirstName('John');
        $this->assertEquals('John', $item->getFirstName());
    }

    public function testSetAndGetLastName()
    {
        $item = new User();
        $item->setLastName('Doe');
        $this->assertEquals('Doe', $item->getLastName());
    }

    public function testSetAndGetUsername()
    {
        $item = new User();
        $item->setUsername('johndoe');
        $this->assertEquals('johndoe', $item->getUsername());
    }

    public function testSetAndGetLanguageCode()
    {
        $item = new User();
        $item->setLanguageCode('en');
        $this->assertEquals('en', $item->getLanguageCode());
    }

    public function testSetAndGetIsBot()
    {
        $item = new User();
        $item->setIsBot(true);
        $this->assertTrue($item->isBot());
    }

    public function testSetAndGetIsPremium()
    {
        $item = new User();
        $item->setIsPremium(true);
        $this->assertTrue($item->getIsPremium());
    }

    public function testSetAndGetAddedToAttachmentMenu()
    {
        $item = new User();
        $item->setAddedToAttachmentMenu(true);
        $this->assertTrue($item->getAddedToAttachmentMenu());
    }

    public function testSetAndGetCanJoinGroups()
    {
        $item = new User();
        $item->setCanJoinGroups(true);
        $this->assertTrue($item->getCanJoinGroups());
    }

    public function testSetAndGetCanReadAllGroupMessages()
    {
        $item = new User();
        $item->setCanReadAllGroupMessages(true);
        $this->assertTrue($item->getCanReadAllGroupMessages());
    }

    public function testSetAndGetSupportsInlineQueries()
    {
        $item = new User();
        $item->setSupportsInlineQueries(true);
        $this->assertTrue($item->getSupportsInlineQueries());
    }

    /**
     * @param User $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals('Griffin T-3H', $item->getFirstName());

        $this->assertNull($item->getLastName());
        $this->assertNull($item->getUsername());
        $this->assertNull($item->getLanguageCode());
        $this->assertNull($item->getIsPremium());
        $this->assertNull($item->getAddedToAttachmentMenu());
        $this->assertNull($item->getCanJoinGroups());
        $this->assertNull($item->getCanReadAllGroupMessages());
        $this->assertNull($item->getSupportsInlineQueries());
        $this->assertFalse($item->isBot());
    }

    /**
     * @param User $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(123456, $item->getId());
        $this->assertEquals('Griffin T-3H', $item->getFirstName());
        $this->assertEquals('Team', $item->getLastName());
        $this->assertEquals('griffin0t03h', $item->getUsername());
        $this->assertEquals('en', $item->getLanguageCode());
        $this->assertFalse($item->getIsPremium());
        $this->assertFalse($item->getAddedToAttachmentMenu());
        $this->assertTrue($item->getCanJoinGroups());
        $this->assertTrue($item->getCanReadAllGroupMessages());
        $this->assertFalse($item->getSupportsInlineQueries());
        $this->assertFalse($item->isBot());
    }

}
