<?php

namespace TelegramBotSDK;

/**
 * Class BaseType
 * Base class for Telegram Types
 *
 * @package TelegramBotSDK
 */
abstract class BaseType
{
    /**
     * Array of required data params for type
     *
     * @var array
     */
    protected static array $requiredParams = [];

    /**
     * Map of input data
     *
     * @var array
     */
    protected static array $map = [];

    /**
     * @param array $data
     * @return void
     */
    public function map(array $data): void
    {
        foreach (static::$map as $key => $item) {
            if (isset($data[$key]) && (!is_array($data[$key]) || !empty($data[$key]))) {
                $method = 'set' . self::toCamelCase($key);
                if ($item === true) {
                    $this->$method($data[$key]);
                } else {
                    $this->$method($item::fromResponse($data[$key]));
                }
            }
        }
    }

    /**
     * @param string $str
     * @return string
     */
    protected static function toCamelCase(string $str): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    /**
     * @param array $data
     * @throws InvalidArgumentException
     */
    public static function fromResponse(array $data)
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * Validate input data
     *
     * @param array $data
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public static function validate(array $data): bool
    {
        if (count(array_intersect_key(array_flip(static::$requiredParams), $data)) === count(static::$requiredParams)) {
            return true;
        }

        $missingParams = implode(', ', array_diff(static::$requiredParams, array_keys($data)));
        throw new InvalidArgumentException(sprintf('%s Validation failed. Missing required parameters: %s', static::class, $missingParams));
    }

    /**
     * @param bool $inner
     * @return array|string
     */
    public function toJson(bool $inner = false): array|string
    {
        $output = [];

        foreach (static::$map as $key => $item) {
            $property = lcfirst(self::toCamelCase($key));
            if (!is_null($this->$property)) {
                if (is_array($this->$property)) {
                    $output[$key] = array_map(
                        /**
                         * @param mixed $v
                         * @return array|false|string
                         */
                        function (mixed $v) {
                            return is_object($v) ? $v->toJson(true) : $v;
                        },
                        $this->$property,
                    );
                } else {
                    $output[$key] = $item === true ? $this->$property : $this->$property->toJson(true);
                }
            }
        }

        return $inner === false ? json_encode($output) : $output;
    }
}
