<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class LinkPreviewOptions
 * Describes the options used for link preview generation.
 *
 * @package TelegramBotSDK\Types
 */
class LinkPreviewOptions extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'is_disabled' => true,
        'url' => true,
        'prefer_small_media' => true,
        'prefer_large_media' => true,
        'show_above_text' => true,
    ];

    /**
     * Optional. True, if the link preview is disabled
     *
     * @var bool|null
     */
    protected ?bool $isDisabled = null;

    /**
     * Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
     *
     * @var string|null
     */
    protected ?string $url = null;

    /**
     * Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly
     * specified or media size change isn't supported for the preview
     *
     * @var bool|null
     */
    protected ?bool $preferSmallMedia = null;

    /**
     * Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly
     * specified or media size change isn't supported for the preview
     *
     * @var bool|null
     */
    protected ?bool $preferLargeMedia = null;

    /**
     * Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be
     * shown below the message text
     *
     * @var bool|null
     */
    protected ?bool $showAboveText = null;

    /**
     * @return bool|null
     */
    public function getIsDisabled(): ?bool
    {
        return $this->isDisabled;
    }

    /**
     * @param bool|null $isDisabled
     * @return void
     */
    public function setIsDisabled(?bool $isDisabled): void
    {
        $this->isDisabled = $isDisabled;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return void
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool|null
     */
    public function getPreferSmallMedia(): ?bool
    {
        return $this->preferSmallMedia;
    }

    /**
     * @param bool|null $preferSmallMedia
     * @return void
     */
    public function setPreferSmallMedia(?bool $preferSmallMedia): void
    {
        $this->preferSmallMedia = $preferSmallMedia;
    }

    /**
     * @return bool|null
     */
    public function getPreferLargeMedia(): ?bool
    {
        return $this->preferLargeMedia;
    }

    /**
     * @param bool|null $preferLargeMedia
     * @return void
     */
    public function setPreferLargeMedia(?bool $preferLargeMedia): void
    {
        $this->preferLargeMedia = $preferLargeMedia;
    }

    /**
     * @return bool|null
     */
    public function getShowAboveText(): ?bool
    {
        return $this->showAboveText;
    }

    /**
     * @param bool|null $showAboveText
     * @return void
     */
    public function setShowAboveText(?bool $showAboveText): void
    {
        $this->showAboveText = $showAboveText;
    }
}
