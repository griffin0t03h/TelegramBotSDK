<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class WriteAccessAllowed
 * This object represents a service message about a user allowing a bot to write messages after adding it to the
 * attachment menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method
 * requestWriteAccess.
 *
 * @package TelegramBotSDK\Types
 */
class WriteAccessAllowed extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'from_request' => true,
        'web_app_name' => true,
        'from_attachment_menu' => true,
    ];

    /**
     * Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the
     * method requestWriteAccess
     *
     * @var bool|null
     */
    protected ?bool $fromRequest = null;

    /**
     * Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
     *
     * @var string|null
     */
    protected ?string $webAppName = null;

    /**
     * Optional. True, if the access was granted when the bot was added to the attachment or side menu
     *
     * @var bool|null
     */
    protected ?bool $fromAttachmentMenu = null;

    /**
     * @return bool|null
     */
    public function isFromRequest(): ?bool
    {
        return $this->fromRequest;
    }

    /**
     * @param bool|null $fromRequest
     * @return void
     */
    public function setFromRequest(?bool $fromRequest): void
    {
        $this->fromRequest = $fromRequest;
    }

    /**
     * @return string|null
     */
    public function getWebAppName(): ?string
    {
        return $this->webAppName;
    }

    /**
     * @param string|null $webAppName
     * @return void
     */
    public function setWebAppName(?string $webAppName): void
    {
        $this->webAppName = $webAppName;
    }

    /**
     * @return bool|null
     */
    public function isFromAttachmentMenu(): ?bool
    {
        return $this->fromAttachmentMenu;
    }

    /**
     * @param bool|null $fromAttachmentMenu
     * @return void
     */
    public function setFromAttachmentMenu(?bool $fromAttachmentMenu): void
    {
        $this->fromAttachmentMenu = $fromAttachmentMenu;
    }
}
