<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;

/**
 * Class PollAnswer
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 *
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @package TelegramBotSDK\Types
 */
class PollAnswer extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['poll_id', 'option_ids'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'poll_id' => true,
        'voter_chat' => Chat::class,
        'user' => User::class,
        'option_ids' => true,
    ];

    /**
     * Unique poll identifier
     *
     * @var string
     */
    protected string $pollId;

    /**
     * Optional. The chat that changed the answer to the poll, if the voter is anonymous
     *
     * @var Chat|null
     */
    protected ?Chat $voterChat = null;

    /**
     * Optional. The user that changed the answer to the poll, if the voter isn't anonymous
     *
     * @var User|null
     */
    protected ?User $user = null;

    /**
     * 0-based identifiers of chosen answer options. May be empty if the vote was retracted
     *
     * @var int[]
     */
    protected array $optionIds;

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->pollId;
    }

    /**
     * @param string $pollId
     * @return void
     */
    public function setPollId(string $pollId): void
    {
        $this->pollId = $pollId;
    }

    /**
     * @return Chat|null
     */
    public function getVoterChat(): ?Chat
    {
        return $this->voterChat;
    }

    /**
     * @param Chat|null $voterChat
     * @return void
     */
    public function setVoterChat(?Chat $voterChat): void
    {
        $this->voterChat = $voterChat;
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
     * @return int[]
     */
    public function getOptionIds(): array
    {
        return $this->optionIds;
    }

    /**
     * @param int[] $optionIds
     * @return void
     */
    public function setOptionIds(array $optionIds): void
    {
        $this->optionIds = $optionIds;
    }
}
