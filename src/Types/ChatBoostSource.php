<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\ChatBoostSource as ChatBoostSourceEnum;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

/**
 * Class ChatBoostSource
 * This object describes the source of a chat boost.
 *
 * @package TelegramBotSDK\Types
 */
class ChatBoostSource extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['source'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'source' => true,
    ];

    /**
     * Source of the boost, can be either “premium”, “gift_code” or “giveaway”
     *
     * @var ChatBoostSourceEnum
     */
    protected ChatBoostSourceEnum $source;

    /**
     * @psalm-suppress LessSpecificReturnStatement,MoreSpecificReturnType
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): ChatBoostSourcePremium|ChatBoostSourceGiftCode|ChatBoostSource|ChatBoostSourceGiveaway|static
    {
        self::validate($data);
        $source = $data['source'];

        $class = match ($source) {
            ChatBoostSourceEnum::Premium->value => ChatBoostSourcePremium::class,
            ChatBoostSourceEnum::GiftCode->value => ChatBoostSourceGiftCode::class,
            ChatBoostSourceEnum::Giveaway->value => ChatBoostSourceGiveaway::class,
            default => ChatBoostSource::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return ChatBoostSourceEnum
     */
    public function getSource(): ChatBoostSourceEnum
    {
        return $this->source;
    }

    /**
     * @param ChatBoostSourceEnum|string $source
     * @return void
     */
    public function setSource(ChatBoostSourceEnum|string $source): void
    {
        if ($source instanceof ChatBoostSourceEnum) {
            $this->source = $source;
        } else {
            $this->source = ChatBoostSourceEnum::tryFrom($source) ?? ChatBoostSourceEnum::Unknown;
        }
    }
}
