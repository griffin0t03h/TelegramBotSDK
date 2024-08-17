<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class MessageReactionUpdated
 * This object represents a change of a reaction on a message performed by a user.
 *
 * @package TelegramBotSDK\Types
 */
class MessageReactionUpdated extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chat', 'message_id', 'date', 'old_reaction', 'new_reaction'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'message_id' => true,
        'user' => User::class,
        'actor_chat' => Chat::class,
        'date' => true,
        'old_reaction' => ArrayOfReactionType::class,
        'new_reaction' => ArrayOfReactionType::class,
    ];

    /**
     * The chat containing the message the user reacted to
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Unique identifier of the message inside the chat
     *
     * @var int
     */
    protected int $messageId;

    /**
     * Optional. The user that changed the reaction, if the user isn't anonymous
     *
     * @var User|null
     */
    protected ?User $user = null;

    /**
     * Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
     *
     * @var Chat|null
     */
    protected ?Chat $actorChat = null;

    /**
     * Date of the change in Unix time
     *
     * @var int
     */
    protected int $date;

    /**
     * Previous list of reaction types that were set by the user
     *
     * @var ReactionType[]
     */
    protected array $oldReaction;

    /**
     * New list of reaction types that have been set by the user
     *
     * @var ReactionType[]
     */
    protected array $newReaction;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     * @return void
     */
    public function setChat(Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return void
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return void
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Chat|null
     */
    public function getActorChat(): ?Chat
    {
        return $this->actorChat;
    }

    /**
     * @param Chat|null $actorChat
     * @return void
     */
    public function setActorChat(?Chat $actorChat): void
    {
        $this->actorChat = $actorChat;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return void
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return ReactionType[]
     */
    public function getOldReaction(): array
    {
        return $this->oldReaction;
    }

    /**
     * @param ReactionType[] $oldReaction
     * @return void
     */
    public function setOldReaction(array $oldReaction): void
    {
        $this->oldReaction = $oldReaction;
    }

    /**
     * @return ReactionType[]
     */
    public function getNewReaction(): array
    {
        return $this->newReaction;
    }

    /**
     * @param ReactionType[] $newReaction
     * @return void
     */
    public function setNewReaction(array $newReaction): void
    {
        $this->newReaction = $newReaction;
    }
}
