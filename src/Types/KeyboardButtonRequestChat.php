<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class KeyboardButtonRequestChat
 * This object defines the criteria used to request a suitable chat.
 * Information about the selected chat will be shared with the bot when the corresponding button is pressed.
 * The bot will be granted requested rights in the chat if appropriate. [More about requesting
 * chats](https://core.telegram.org/bots/features#chat-and-user-selection)
 *
 * @package TelegramBotSDK\Types
 */
class KeyboardButtonRequestChat extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['request_id', 'chat_is_channel'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'request_id' => true,
        'chat_is_channel' => true,
        'chat_is_forum' => true,
        'chat_has_username' => true,
        'chat_is_created' => true,
        'user_administrator_rights' => ChatAdministratorRights::class,
        'bot_administrator_rights' => ChatAdministratorRights::class,
        'bot_is_member' => true,
        'request_title' => true,
        'request_username' => true,
        'request_photo' => true,
    ];

    /**
     * Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique
     * within the message
     *
     * @var int
     */
    protected int $requestId;

    /**
     * Pass True to request a channel chat, pass False to request a group or a supergroup chat.
     *
     * @var bool
     */
    protected bool $chatIsChannel;

    /**
     * Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no
     * additional restrictions are applied.
     *
     * @var bool|null
     */
    protected ?bool $chatIsForum = null;

    /**
     * Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a
     * username. If not specified, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected ?bool $chatHasUsername = null;

    /**
     * Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
     *
     * @var bool|null
     */
    protected ?bool $chatIsCreated = null;

    /**
     * Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights
     * must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
     *
     * @var ChatAdministratorRights|null
     */
    protected ?ChatAdministratorRights $userAdministratorRights = null;

    /**
     * Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights
     * must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
     *
     * @var ChatAdministratorRights|null
     */
    protected ?ChatAdministratorRights $botAdministratorRights = null;

    /**
     * Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are
     * applied.
     *
     * @var bool|null
     */
    protected ?bool $botIsMember = null;

    /**
     * Optional. Pass True to request the chat's title.
     *
     * @var bool|null
     */
    protected ?bool $requestTitle = null;

    /**
     * Optional. Pass True to request the chat's username.
     *
     * @var bool|null
     */
    protected ?bool $requestUsername = null;

    /**
     * Optional. Pass True to request the chat's photo.
     *
     * @var bool|null
     */
    protected ?bool $requestPhoto = null;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param int $requestId
     * @return void
     */
    public function setRequestId(int $requestId): void
    {
        $this->requestId = $requestId;
    }

    /**
     * @return bool
     */
    public function getChatIsChannel(): bool
    {
        return $this->chatIsChannel;
    }

    /**
     * @param bool $chatIsChannel
     * @return void
     */
    public function setChatIsChannel(bool $chatIsChannel): void
    {
        $this->chatIsChannel = $chatIsChannel;
    }

    /**
     * @return bool|null
     */
    public function getChatIsForum(): ?bool
    {
        return $this->chatIsForum;
    }

    /**
     * @param bool|null $chatIsForum
     * @return void
     */
    public function setChatIsForum(?bool $chatIsForum): void
    {
        $this->chatIsForum = $chatIsForum;
    }

    /**
     * @return bool|null
     */
    public function getChatHasUsername(): ?bool
    {
        return $this->chatHasUsername;
    }

    /**
     * @param bool|null $chatHasUsername
     * @return void
     */
    public function setChatHasUsername(?bool $chatHasUsername): void
    {
        $this->chatHasUsername = $chatHasUsername;
    }

    /**
     * @return bool|null
     */
    public function getChatIsCreated(): ?bool
    {
        return $this->chatIsCreated;
    }

    /**
     * @param bool|null $chatIsCreated
     * @return void
     */
    public function setChatIsCreated(?bool $chatIsCreated): void
    {
        $this->chatIsCreated = $chatIsCreated;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getUserAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->userAdministratorRights;
    }

    /**
     * @param ChatAdministratorRights|null $userAdministratorRights
     * @return void
     */
    public function setUserAdministratorRights(?ChatAdministratorRights $userAdministratorRights): void
    {
        $this->userAdministratorRights = $userAdministratorRights;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getBotAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->botAdministratorRights;
    }

    /**
     * @param ChatAdministratorRights|null $botAdministratorRights
     * @return void
     */
    public function setBotAdministratorRights(?ChatAdministratorRights $botAdministratorRights): void
    {
        $this->botAdministratorRights = $botAdministratorRights;
    }

    /**
     * @return bool|null
     */
    public function getBotIsMember(): ?bool
    {
        return $this->botIsMember;
    }

    /**
     * @param bool|null $botIsMember
     * @return void
     */
    public function setBotIsMember(?bool $botIsMember): void
    {
        $this->botIsMember = $botIsMember;
    }

    /**
     * @return bool|null
     */
    public function getRequestTitle(): ?bool
    {
        return $this->requestTitle;
    }

    /**
     * @param bool|null $requestTitle
     * @return void
     */
    public function setRequestTitle(?bool $requestTitle): void
    {
        $this->requestTitle = $requestTitle;
    }

    /**
     * @return bool|null
     */
    public function getRequestUsername(): ?bool
    {
        return $this->requestUsername;
    }

    /**
     * @param bool|null $requestUsername
     * @return void
     */
    public function setRequestUsername(?bool $requestUsername): void
    {
        $this->requestUsername = $requestUsername;
    }

    /**
     * @return bool|null
     */
    public function getRequestPhoto(): ?bool
    {
        return $this->requestPhoto;
    }

    /**
     * @param bool|null $requestPhoto
     * @return void
     */
    public function setRequestPhoto(?bool $requestPhoto): void
    {
        $this->requestPhoto = $requestPhoto;
    }
}
