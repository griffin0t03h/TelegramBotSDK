<?php

namespace TelegramBotSDK\Test\Types;

use TelegramBotSDK\Test\AbstractTypeTest;
use TelegramBotSDK\Test\Types\Inline\ChosenInlineResultTest;
use TelegramBotSDK\Test\Types\Inline\InlineQueryTest;
use TelegramBotSDK\Test\Types\Payments\Query\PreCheckoutQueryTest;
use TelegramBotSDK\Test\Types\Payments\Query\ShippingQueryTest;
use TelegramBotSDK\Types\Update;

class UpdateTest extends AbstractTypeTest
{
    public static function getFullResponse(): array
    {
        return [
            'update_id' => 10,
            'message' => MessageTest::getMinResponse(),
            'edited_message' => MessageTest::getMinResponse(),
            'channel_post' => MessageTest::getMinResponse(),
            'edited_channel_post' => MessageTest::getMinResponse(),
            'inline_query' => InlineQueryTest::getMinResponse(),
            'chosen_inline_result' => ChosenInlineResultTest::getMinResponse(),
            'callback_query' => CallbackQueryTest::getMinResponse(),
            'shipping_query' => ShippingQueryTest::getMinResponse(),
            'pre_checkout_query' => PreCheckoutQueryTest::getMinResponse(),
            'poll_answer' => PollAnswerTest::getMinResponse(),
            'poll' => PollTest::getMinResponse(),
            'chat_join_request' => ChatJoinRequestTest::getMinResponse(),
            'message_reaction' => MessageReactionUpdatedTest::getMinResponse(),
            'message_reaction_count' => MessageReactionCountUpdatedTest::getMinResponse(),
            'chat_boost' => ChatBoostUpdatedTest::getMinResponse(),
            'chat_boost_removed' => ChatBoostRemovedTest::getMinResponse(),
        ];
    }

    public static function getMinResponse(): array
    {
        return [
            'update_id' => 10,
        ];
    }

    protected static function getType(): string
    {
        return Update::class;
    }

    /**
     * @param Update $item
     * @return void
     */
    protected function assertMinItem($item): void
    {
        $this->assertEquals(10, $item->getUpdateId());
        $this->assertNull($item->getMessage());
        $this->assertNull($item->getEditedMessage());
        $this->assertNull($item->getChannelPost());
        $this->assertNull($item->getEditedChannelPost());
        $this->assertNull($item->getInlineQuery());
        $this->assertNull($item->getChosenInlineResult());
        $this->assertNull($item->getCallbackQuery());
        $this->assertNull($item->getShippingQuery());
        $this->assertNull($item->getPreCheckoutQuery());
        $this->assertNull($item->getPollAnswer());
        $this->assertNull($item->getPoll());
        $this->assertNull($item->getMyChatMember());
        $this->assertNull($item->getChatMember());
        $this->assertNull($item->getChatJoinRequest());
        $this->assertNull($item->getMessageReaction());
        $this->assertNull($item->getMessageReactionCount());
        $this->assertNull($item->getChatBoost());
        $this->assertNull($item->getChatBoostRemoved());
    }

    /**
     * @param Update $item
     * @return void
     */
    protected function assertFullItem($item): void
    {
        $this->assertEquals(10, $item->getUpdateId());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getMessage());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getEditedMessage());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getChannelPost());
        $this->assertEquals(MessageTest::createMinInstance(), $item->getEditedChannelPost());
        $this->assertEquals(InlineQueryTest::createMinInstance(), $item->getInlineQuery());
        $this->assertEquals(ChosenInlineResultTest::createMinInstance(), $item->getChosenInlineResult());
        $this->assertEquals(CallbackQueryTest::createMinInstance(), $item->getCallbackQuery());
        $this->assertEquals(ShippingQueryTest::createMinInstance(), $item->getShippingQuery());
        $this->assertEquals(PreCheckoutQueryTest::createMinInstance(), $item->getPreCheckoutQuery());
        $this->assertEquals(PollAnswerTest::createMinInstance(), $item->getPollAnswer());
        $this->assertEquals(PollTest::createMinInstance(), $item->getPoll());
        $this->assertEquals(ChatJoinRequestTest::createMinInstance(), $item->getChatJoinRequest());
        $this->assertEquals(MessageReactionUpdatedTest::createMinInstance(), $item->getMessageReaction());
        $this->assertEquals(MessageReactionCountUpdatedTest::createMinInstance(), $item->getMessageReactionCount());
        $this->assertEquals(ChatBoostUpdatedTest::createMinInstance(), $item->getChatBoost());
        $this->assertEquals(ChatBoostRemovedTest::createMinInstance(), $item->getChatBoostRemoved());
    }
}
