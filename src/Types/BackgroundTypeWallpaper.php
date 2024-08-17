<?php

namespace TelegramBotSDK\Types;

/**
 * Class BackgroundTypeWallpaper
 * The background is a wallpaper in the JPEG format.
 *
 * @package TelegramBotSDK\Types
 */
class BackgroundTypeWallpaper extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'document', 'dark_theme_dimming'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'document' => Document::class,
        'dark_theme_dimming' => true,
        'is_blurred' => true,
        'is_moving' => true,
    ];

    /**
     * Document with the wallpaper
     *
     * @var Document
     */
    protected Document $document;

    /**
     * Dimming of the background in dark themes, as a percentage; 0-100
     *
     * @var int
     */
    protected int $darkThemeDimming;

    /**
     * Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
     *
     * @var bool|null
     */
    protected ?bool $isBlurred = null;

    /**
     * Optional. True, if the background moves slightly when the device is tilted
     *
     * @var bool|null
     */
    protected ?bool $isMoving = null;

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @param Document $document
     * @return void
     */
    public function setDocument(Document $document): void
    {
        $this->document = $document;
    }

    /**
     * @return int
     */
    public function getDarkThemeDimming(): int
    {
        return $this->darkThemeDimming;
    }

    /**
     * @param int $darkThemeDimming
     * @return void
     */
    public function setDarkThemeDimming(int $darkThemeDimming): void
    {
        $this->darkThemeDimming = $darkThemeDimming;
    }

    /**
     * @return bool|null
     */
    public function getIsBlurred(): ?bool
    {
        return $this->isBlurred;
    }

    /**
     * @param bool|null $isBlurred
     * @return void
     */
    public function setIsBlurred(?bool $isBlurred): void
    {
        $this->isBlurred = $isBlurred;
    }

    /**
     * @return bool|null
     */
    public function getIsMoving(): ?bool
    {
        return $this->isMoving;
    }

    /**
     * @param bool|null $isMoving
     * @return void
     */
    public function setIsMoving(?bool $isMoving): void
    {
        $this->isMoving = $isMoving;
    }
}
