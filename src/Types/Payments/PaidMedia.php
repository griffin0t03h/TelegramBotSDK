<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Enum\PaidMediaType;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\TypeInterface;

/**
 * Class PaidMedia
 * This object describes paid media.
 *
 * @see https://core.telegram.org/bots/api#paidmedia
 *
 * @package TelegramBotSDK\Types\Payments
 */
class PaidMedia extends BaseType implements TypeInterface
{
    /**
     * @psalm-suppress MoreSpecificReturnType,LessSpecificReturnStatement
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data): PaidMedia|PaidMediaPreview|PaidMediaPhoto|PaidMediaVideo|static
    {
        self::validate($data);

        $class = match ($data['type']) {
            PaidMediaType::Preview->value => PaidMediaPreview::class,
            PaidMediaType::Photo->value => PaidMediaPhoto::class,
            PaidMediaType::Video->value => PaidMediaVideo::class,
            default => PaidMedia::class,
        };

        $instance = new $class();
        $instance->map($data);

        return $instance;
    }

    /**
     * Type of the paid media
     *
     * @var PaidMediaType
     */
    protected PaidMediaType $type;

    /**
     * @return PaidMediaType
     */
    public function getType(): PaidMediaType
    {
        return $this->type;
    }

    /**
     * @param PaidMediaType $type
     * @return void
     */
    public function setType(PaidMediaType $type): void
    {
        $this->type = $type;
    }
}
