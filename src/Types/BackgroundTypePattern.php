<?php

namespace TelegramBotSDK\Types;

/**
 * Class BackgroundTypePattern
 * The background is a PNG or TGV pattern to be combined with the background fill chosen by the user.
 *
 * @package TelegramBotSDK\Types
 */
class BackgroundTypePattern extends BackgroundType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'document', 'fill', 'intensity'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'document' => Document::class,
        'fill' => BackgroundFill::class,
        'intensity' => true,
        'is_inverted' => true,
        'is_moving' => true,
    ];

    /**
     * Document with the pattern
     *
     * @var Document
     */
    protected Document $document;

    /**
     * The background fill that is combined with the pattern
     *
     * @var BackgroundFill
     */
    protected BackgroundFill $fill;

    /**
     * Intensity of the pattern when it is shown above the filled background; 0-100
     *
     * @var int
     */
    protected int $intensity;

    /**
     * Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in
     * this case. For dark themes only
     *
     * @var bool|null
     */
    protected ?bool $isInverted = null;

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
     * @return BackgroundFill
     */
    public function getFill(): BackgroundFill
    {
        return $this->fill;
    }

    /**
     * @param BackgroundFill $fill
     * @return void
     */
    public function setFill(BackgroundFill $fill): void
    {
        $this->fill = $fill;
    }

    /**
     * @return int
     */
    public function getIntensity(): int
    {
        return $this->intensity;
    }

    /**
     * @param int $intensity
     * @return void
     */
    public function setIntensity(int $intensity): void
    {
        $this->intensity = $intensity;
    }

    /**
     * @return bool|null
     */
    public function getIsInverted(): ?bool
    {
        return $this->isInverted;
    }

    /**
     * @param bool $isInverted
     * @return void
     */
    public function setIsInverted(bool $isInverted): void
    {
        $this->isInverted = $isInverted;
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
