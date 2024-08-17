<?php

namespace TelegramBotSDK\Collection;

use ArrayObject;

/**
 * @extends ArrayObject<string|array-key, CollectionItemInterface>
 */
class Collection extends ArrayObject
{
    /**
     * @var int Max items count, if set 0 - unlimited
     */
    protected int $maxCount = 0;

    /**
     * @param CollectionItemInterface[] $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct($items);
    }

    /**
     * @param CollectionItemInterface $item
     * @param mixed|null $key
     * @return void
     * @throws ReachedMaxSizeException
     * @throws KeyHasUseException
     */
    public function addItem(CollectionItemInterface $item, mixed $key = null): void
    {
        if ($this->maxCount > 0 && $this->count() + 1 > $this->maxCount) {
            throw new ReachedMaxSizeException("Maximum collection items count reached. Max size: $this->maxCount");
        }

        if ($key == null) {
            $this->append($item);
        } else {
            if ($this->offsetExists($key)) {
                throw new KeyHasUseException("Key $key already in use.");
            }
            $this->offsetSet($key, $item);
        }
    }

    /**
     * @param int|string $key
     * @return void
     * @throws KeyInvalidException
     */
    public function deleteItem(int|string $key): void
    {
        $this->checkItemKey($key);

        $this->offsetUnset($key);
    }

    /**
     * @param int|string $key
     *
     * @return void
     * @throws KeyInvalidException
     *
     */
    private function checkItemKey(int|string $key): void
    {
        if (!$this->offsetExists($key)) {
            throw new KeyInvalidException("Invalid key $key.");
        }
    }

    /**
     * @param int|string $key
     * @return CollectionItemInterface
     * @throws KeyInvalidException
     */
    public function getItem(int|string $key): CollectionItemInterface
    {
        $this->checkItemKey($key);

        return $this->offsetGet($key);
    }

    /**
     * @param bool $inner
     * @return array|string
     */
    public function toJson(bool $inner = false): array|string
    {
        $output = [];
        foreach ($this as $item) {
            $output[] = $item->toJson(true);
        }

        return $inner === false ? json_encode($output) : $output;
    }

    /**
     * @param int $maxCount
     * @return void
     */
    public function setMaxCount(int $maxCount): void
    {
        $this->maxCount = $maxCount;
    }
}
