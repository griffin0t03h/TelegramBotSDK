<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\MessageOriginType;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

/**
 * Class MessageOrigin
 * This object describes the origin of a message.
 *
 * @package TelegramBotSDK\Types
 */
class MessageOrigin extends BaseType implements TypeInterface
{
    protected static array $requiredParams = ['type', 'date'];

    protected static array $map = [
        'type' => true,
        'date' => true,
    ];

    /**
     * Type of the message origin
     *
     * @var MessageOriginType
     */
    protected MessageOriginType $type;

    /**
     * Date the message was sent originally in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): MessageOrigin|MessageOriginUser|MessageOriginHiddenUser|MessageOriginChat|MessageOriginChannel
    {
        self::validate($data);
        $class = match ($data['type']) {
            MessageOriginType::User->value => MessageOriginUser::class,
            MessageOriginType::HiddenUser->value => MessageOriginHiddenUser::class,
            MessageOriginType::Chat->value => MessageOriginChat::class,
            MessageOriginType::Channel->value => MessageOriginChannel::class,
            default => MessageOrigin::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return MessageOriginType
     *
     * @see $type
     */
    public function getType(): MessageOriginType
    {
        return $this->type;
    }

    /**
     * @param MessageOriginType|string $type
     * @return void
     *
     * @see $type
     */
    public function setType(MessageOriginType|string $type): void
    {
        if ($type instanceof MessageOriginType) {
            $this->type = $type;
        } else {
            $this->type = MessageOriginType::tryFrom($type) ?? MessageOriginType::Unknown;
        }
    }

    /**
     * @return int
     *
     * @see $date
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     *
     * @see $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }
}
