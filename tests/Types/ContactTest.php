<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\Contact;

class ContactTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [
            'first_name' => 'Griffin T-3H',
            'phone_number' => '123456',
        ];
    }

    public static function getFullResponse(): array
    {
        return [
            'first_name' => 'Griffin T-3H',
            'last_name' => 'Team',
            'phone_number' => '123456',
            'user_id' => 1,
            'vcard' => 'vcard',
        ];
    }

    protected static function getType(): string
    {
        return Contact::class;
    }

    /**
     * @param Contact $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals('123456', $item->getPhoneNumber());
        $this->assertEquals('Griffin T-3H', $item->getFirstName());
        $this->assertNull($item->getLastName());
        $this->assertNull($item->getUserId());
        $this->assertNull($item->getVCard());
    }

    /**
     * @param Contact $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals('123456', $item->getPhoneNumber());
        $this->assertEquals('Griffin T-3H', $item->getFirstName());
        $this->assertEquals('Team', $item->getLastName());
        $this->assertEquals(1, $item->getUserId());
        $this->assertEquals('vcard', $item->getVCard());
    }
}
