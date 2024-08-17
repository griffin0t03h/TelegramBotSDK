<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class Poll
 * This object contains information about a poll.
 *
 * @package TelegramBotSDK\Types
 */
class Poll extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = [
        'id',
        'question',
        'options',
        'total_voter_count',
        'is_closed',
        'is_anonymous',
        'type',
        'allows_multiple_answers',
    ];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'question' => true,
        'question_entities' => ArrayOfMessageEntity::class,
        'options' => ArrayOfPollOption::class,
        'total_voter_count' => true,
        'is_closed' => true,
        'is_anonymous' => true,
        'type' => true,
        'allows_multiple_answers' => true,
        'correct_option_id' => true,
        'explanation' => true,
        'explanation_entities' => ArrayOfMessageEntity::class,
        'open_period' => true,
        'close_date' => true,
    ];

    /**
     * Unique poll identifier
     *
     * @var string
     */
    protected string $id;

    /**
     * Poll question, 1-300 characters
     *
     * @var string
     */
    protected string $question;

    /**
     * Optional. Special entities that appear in the question. Currently, only custom emoji entities are allowed in
     * poll questions.
     *
     * @var MessageEntity[]|null
     */
    protected ?array $questionEntities = null;

    /**
     * List of poll options
     *
     * @var PollOption[]
     */
    protected array $options;

    /**
     * Total number of users that voted in the poll
     *
     * @var int
     */
    protected int $totalVoterCount;

    /**
     * True, if the poll is closed
     *
     * @var bool
     */
    protected bool $isClosed;

    /**
     * True, if the poll is anonymous
     *
     * @var bool
     */
    protected bool $isAnonymous;

    /**
     * Poll type, currently can be “regular” or “quiz”
     *
     * @var string
     */
    protected string $type;

    /**
     * True, if the poll allows multiple answers
     *
     * @var bool
     */
    protected bool $allowsMultipleAnswers;

    /**
     * Optional. 0-based identifier of the correct answer option.
     * Available only for polls in the quiz mode, which are closed, or was sent (not forwarded)
     * by the bot or to the private chat with the bot.
     *
     * @var int|null
     */
    protected ?int $correctOptionId = null;

    /**
     * Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style
     * poll, 0-200 characters
     *
     * @var string|null
     */
    protected ?string $explanation = null;

    /**
     * Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
     *
     * @var MessageEntity[]|null
     */
    protected ?array $explanationEntities = null;

    /**
     * Optional. Amount of time in seconds the poll will be active after creation
     *
     * @var int|null
     */
    protected ?int $openPeriod = null;

    /**
     * Optional. Point in time (Unix timestamp) when the poll will be automatically closed
     *
     * @var int|null
     */
    protected ?int $closeDate = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     * @return void
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getQuestionEntities(): ?array
    {
        return $this->questionEntities;
    }

    /**
     * @param MessageEntity[]|null $questionEntities
     * @return void
     */
    public function setQuestionEntities(?array $questionEntities): void
    {
        $this->questionEntities = $questionEntities;
    }

    /**
     * @return PollOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param PollOption[] $options
     * @return void
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * @return int
     */
    public function getTotalVoterCount(): int
    {
        return $this->totalVoterCount;
    }

    /**
     * @param int $totalVoterCount
     * @return void
     */
    public function setTotalVoterCount(int $totalVoterCount): void
    {
        $this->totalVoterCount = $totalVoterCount;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->isClosed;
    }

    /**
     * @param bool $isClosed
     * @return void
     */
    public function setIsClosed(bool $isClosed): void
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return bool
     */
    public function isAnonymous(): bool
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $isAnonymous
     * @return void
     */
    public function setIsAnonymous(bool $isAnonymous): void
    {
        $this->isAnonymous = $isAnonymous;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isAllowsMultipleAnswers(): bool
    {
        return $this->allowsMultipleAnswers;
    }

    /**
     * @param bool $allowsMultipleAnswers
     * @return void
     */
    public function setAllowsMultipleAnswers(bool $allowsMultipleAnswers): void
    {
        $this->allowsMultipleAnswers = $allowsMultipleAnswers;
    }

    /**
     * @return int|null
     */
    public function getCorrectOptionId(): ?int
    {
        return $this->correctOptionId;
    }

    /**
     * @param int $correctOptionId
     * @return void
     */
    public function setCorrectOptionId(int $correctOptionId): void
    {
        $this->correctOptionId = $correctOptionId;
    }

    /**
     * @return string|null
     */
    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    /**
     * @param string|null $explanation
     * @return void
     */
    public function setExplanation(?string $explanation): void
    {
        $this->explanation = $explanation;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getExplanationEntities(): ?array
    {
        return $this->explanationEntities;
    }

    /**
     * @param MessageEntity[]|null $explanationEntities
     * @return void
     */
    public function setExplanationEntities(?array $explanationEntities): void
    {
        $this->explanationEntities = $explanationEntities;
    }

    /**
     * @return int|null
     */
    public function getOpenPeriod(): ?int
    {
        return $this->openPeriod;
    }

    /**
     * @param int|null $openPeriod
     * @return void
     */
    public function setOpenPeriod(?int $openPeriod): void
    {
        $this->openPeriod = $openPeriod;
    }

    /**
     * @return int|null
     */
    public function getCloseDate(): ?int
    {
        return $this->closeDate;
    }

    /**
     * @param int|null $closeDate
     * @return void
     */
    public function setCloseDate(?int $closeDate): void
    {
        $this->closeDate = $closeDate;
    }
}
