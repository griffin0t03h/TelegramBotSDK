<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Types\ChatPermissions;

class ChatPermissionsTest extends AbstractTypeTest
{
    public static function getMinResponse(): array
    {
        return [];
    }

    public static function getFullResponse(): array
    {
        return [
            'can_send_messages' => true,
            'can_send_media_messages' => true,
            'can_send_polls' => true,
            'can_send_other_messages' => true,
            'can_add_web_page_previews' => true,
            'can_change_info' => true,
            'can_invite_users' => true,
            'can_pin_messages' => true,
        ];
    }

    protected static function getType(): string
    {
        return ChatPermissions::class;
    }

    /**
     * @param ChatPermissions $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertNull($item->isCanSendMessages());
        $this->assertNull($item->isCanSendMediaMessages());
        $this->assertNull($item->isCanSendPolls());
        $this->assertNull($item->isCanSendOtherMessages());
        $this->assertNull($item->isCanAddWebPagePreviews());
        $this->assertNull($item->isCanChangeInfo());
        $this->assertNull($item->isCanInviteUsers());
        $this->assertNull($item->isCanPinMessages());
    }

    /**
     * @param ChatPermissions $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertTrue($item->isCanSendMessages());
        $this->assertTrue($item->isCanSendMediaMessages());
        $this->assertTrue($item->isCanSendPolls());
        $this->assertTrue($item->isCanSendOtherMessages());
        $this->assertTrue($item->isCanAddWebPagePreviews());
        $this->assertTrue($item->isCanChangeInfo());
        $this->assertTrue($item->isCanInviteUsers());
        $this->assertTrue($item->isCanPinMessages());
    }
}
