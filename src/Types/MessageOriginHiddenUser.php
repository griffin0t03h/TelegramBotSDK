<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\MessageOriginType;

/**
 * Class MessageOriginHiddenUser
 * The message was originally sent by an unknown user.
 *
 * @package TelegramBotSDK\Types
 */
class MessageOriginHiddenUser extends MessageOrigin
{
    protected static array $requiredParams = ['type', 'date', 'sender_user_name'];

    protected static array $map = [
        'type' => true,
        'date' => true,
        'sender_user_name' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var MessageOriginType
     */
    protected MessageOriginType $type = MessageOriginType::HiddenUser;

    /**
     * Name of the user that sent the message originally
     *
     * @var string
     */
    protected string $senderUserName;

    /**
     * @return string
     *
     * @see $senderUserName
     */
    public function getSenderUserName(): string
    {
        return $this->senderUserName;
    }

    /**
     * @param string $senderUserName
     * @return void
     *
     * @see $senderUserName
     */
    public function setSenderUserName(string $senderUserName): void
    {
        $this->senderUserName = $senderUserName;
    }
}
