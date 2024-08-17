<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\Game\Game;
use TelegramBotSDK\Types\Payments\Invoice;
use TelegramBotSDK\Types\Sticker\Sticker;

/**
 * Class ExternalReplyInfo
 * This object contains information about a message that is being replied to, which may come from another chat or forum
 * topic.
 *
 * @package TelegramBotSDK\Types
 */
class ExternalReplyInfo extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['origin'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'origin' => MessageOrigin::class,
        'chat' => Chat::class,
        'message_id' => true,
        'link_preview_options' => LinkPreviewOptions::class,
        'animation' => Animation::class,
        'audio' => Audio::class,
        'document' => Document::class,
        'photo' => ArrayOfPhotoSize::class,
        'sticker' => Sticker::class,
        'story' => Story::class,
        'video' => Video::class,
        'video_note' => VideoNote::class,
        'voice' => Voice::class,
        'has_media_spoiler' => true,
        'contact' => Contact::class,
        'dice' => Dice::class,
        'game' => Game::class,
        'giveaway' => Giveaway::class,
        'giveaway_winners' => GiveawayWinners::class,
        'invoice' => Invoice::class,
        'location' => Location::class,
        'poll' => Poll::class,
        'venue' => Venue::class,
    ];

    /**
     * Origin of the message replied to by the given message
     *
     * @var MessageOrigin
     */
    protected MessageOrigin $origin;

    /**
     * Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     *
     * @var Chat|null
     */
    protected ?Chat $chat = null;

    /**
     * Optional. Unique message identifier inside the original chat. Available only if the original chat is a
     * supergroup or a channel.
     *
     * @var int|null
     */
    protected ?int $messageId = null;

    /**
     * Optional. Options used for link preview generation for the original message, if it is a text message
     *
     * @var LinkPreviewOptions|null
     */
    protected ?LinkPreviewOptions $linkPreviewOptions = null;

    /**
     * Optional. Message is an animation, information about the animation
     *
     * @var Animation|null
     */
    protected ?Animation $animation = null;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var Audio|null
     */
    protected ?Audio $audio = null;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var Document|null
     */
    protected ?Document $document = null;

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @var PhotoSize[]|null
     */
    protected ?array $photo = null;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var Sticker|null
     */
    protected ?Sticker $sticker = null;

    /**
     * Optional. Message is a forwarded story
     *
     * @var Story|null
     */
    protected ?Story $story = null;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var Video|null
     */
    protected ?Video $video = null;

    /**
     * Optional. Message is a video note, information about the video message
     *
     * @var VideoNote|null
     */
    protected ?VideoNote $videoNote = null;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var Voice|null
     */
    protected ?Voice $voice = null;

    /**
     * Optional. True, if the message media is covered by a spoiler animation
     *
     * @var bool|null
     */
    protected ?bool $hasMediaSpoiler = null;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var Contact|null
     */
    protected ?Contact $contact = null;

    /**
     * Optional. Message is a dice with random value
     *
     * @var Dice|null
     */
    protected ?Dice $dice = null;

    /**
     * Optional. Message is a game, information about the game. [More about
     * games](https://core.telegram.org/bots/api#games)
     *
     * @var Game|null
     */
    protected ?Game $game = null;

    /**
     * Optional. Message is a scheduled giveaway, information about the giveaway
     *
     * @var Giveaway|null
     */
    protected ?Giveaway $giveaway = null;

    /**
     * Optional. A giveaway with public winners was completed
     *
     * @var GiveawayWinners|null
     */
    protected ?GiveawayWinners $giveawayWinners = null;

    /**
     * Optional. Message is an invoice for a [payment](https://core.telegram.org/bots/api#payments), information about
     * the invoice. [More about payments](https://core.telegram.org/bots/api#payments)
     *
     * @var Invoice|null
     */
    protected ?Invoice $invoice = null;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var Location|null
     */
    protected ?Location $location = null;

    /**
     * Optional. Message is a native poll, information about the poll
     *
     * @var Poll|null
     */
    protected ?Poll $poll = null;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var Venue|null
     */
    protected ?Venue $venue = null;

    /**
     * @return MessageOrigin
     *
     * @see $origin
     */
    public function getOrigin(): MessageOrigin
    {
        return $this->origin;
    }

    /**
     * @param MessageOrigin $origin
     * @return void
     *
     * @see $origin
     */
    public function setOrigin(MessageOrigin $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return Chat|null
     *
     * @see $chat
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat|null $chat
     * @return void
     *
     * @see $chat
     */
    public function setChat(?Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return int|null
     *
     * @see $messageId
     */
    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    /**
     * @param int|null $messageId
     * @return void
     *
     * @see $messageId
     */
    public function setMessageId(?int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return LinkPreviewOptions|null
     *
     * @see $linkPreviewOptions
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->linkPreviewOptions;
    }

    /**
     * @param LinkPreviewOptions|null $linkPreviewOptions
     * @return void
     *
     * @see $linkPreviewOptions
     */
    public function setLinkPreviewOptions(?LinkPreviewOptions $linkPreviewOptions): void
    {
        $this->linkPreviewOptions = $linkPreviewOptions;
    }

    /**
     * @return Animation|null
     *
     * @see $animation
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     * @return void
     *
     * @see $animation
     */
    public function setAnimation(?Animation $animation): void
    {
        $this->animation = $animation;
    }

    /**
     * @return Audio|null
     *
     * @see $audio
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio|null $audio
     * @return void
     *
     * @see $audio
     */
    public function setAudio(?Audio $audio): void
    {
        $this->audio = $audio;
    }

    /**
     * @return Document|null
     *
     * @see $document
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Document|null $document
     * @return void
     *
     * @see $document
     */
    public function setDocument(?Document $document): void
    {
        $this->document = $document;
    }

    /**
     * @return array|null
     *
     * @see $photo
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param array|null $photo
     * @return void
     *
     * @see $photo
     */
    public function setPhoto(?array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return Sticker|null
     *
     * @see $sticker
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     * @return void
     *
     * @see $sticker
     */
    public function setSticker(?Sticker $sticker): void
    {
        $this->sticker = $sticker;
    }

    /**
     * @return Story|null
     *
     * @see $story
     */
    public function getStory(): ?Story
    {
        return $this->story;
    }

    /**
     * @param Story|null $story
     * @return void
     *
     * @see $story
     */
    public function setStory(?Story $story): void
    {
        $this->story = $story;
    }

    /**
     * @return Video|null
     *
     * @see $video
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     * @return void
     *
     * @see $video
     */
    public function setVideo(?Video $video): void
    {
        $this->video = $video;
    }

    /**
     * @return VideoNote|null
     *
     * @see $videoNote
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->videoNote;
    }

    /**
     * @param VideoNote|null $videoNote
     * @return void
     *
     * @see $videoNote
     */
    public function setVideoNote(?VideoNote $videoNote): void
    {
        $this->videoNote = $videoNote;
    }

    /**
     * @return Voice|null
     *
     * @see $voice
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param Voice|null $voice
     * @return void
     *
     * @see $voice
     */
    public function setVoice(?Voice $voice): void
    {
        $this->voice = $voice;
    }

    /**
     * @return bool|null
     *
     * @see $hasMediaSpoiler
     */
    public function getHasMediaSpoiler(): ?bool
    {
        return $this->hasMediaSpoiler;
    }

    /**
     * @param bool|null $hasMediaSpoiler
     * @return void
     *
     * @see $hasMediaSpoiler
     */
    public function setHasMediaSpoiler(?bool $hasMediaSpoiler): void
    {
        $this->hasMediaSpoiler = $hasMediaSpoiler;
    }

    /**
     * @return Contact|null
     *
     * @see $contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     * @return void
     *
     * @see $contact
     */
    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return Dice|null
     *
     * @see $dice
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * @param Dice|null $dice
     * @return void
     *
     * @see $dice
     */
    public function setDice(?Dice $dice): void
    {
        $this->dice = $dice;
    }

    /**
     * @return Game|null
     *
     * @see $game
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Game|null $game
     * @return void
     *
     * @see $game
     */
    public function setGame(?Game $game): void
    {
        $this->game = $game;
    }

    /**
     * @return Giveaway|null
     *
     * @see $giveaway
     */
    public function getGiveaway(): ?Giveaway
    {
        return $this->giveaway;
    }

    /**
     * @param Giveaway|null $giveaway
     * @return void
     *
     * @see $giveaway
     */
    public function setGiveaway(?Giveaway $giveaway): void
    {
        $this->giveaway = $giveaway;
    }

    /**
     * @return GiveawayWinners|null
     *
     * @see $giveawayWinners
     */
    public function getGiveawayWinners(): ?GiveawayWinners
    {
        return $this->giveawayWinners;
    }

    /**
     * @param GiveawayWinners|null $giveawayWinners
     * @return void
     *
     * @see $giveawayWinners
     */
    public function setGiveawayWinners(?GiveawayWinners $giveawayWinners): void
    {
        $this->giveawayWinners = $giveawayWinners;
    }

    /**
     * @return Invoice|null
     *
     * @see $invoice
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice|null $invoice
     * @return void
     *
     * @see $invoice
     */
    public function setInvoice(?Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return Location|null
     *
     * @see $location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     * @return void
     *
     * @see $location
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return Poll|null
     *
     * @see $poll
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @param Poll|null $poll
     * @return void
     *
     * @see $poll
     */
    public function setPoll(?Poll $poll): void
    {
        $this->poll = $poll;
    }

    /**
     * @return Venue|null
     *
     * @see $venue
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @param Venue|null $venue
     * @return void
     *
     * @see $venue
     */
    public function setVenue(?Venue $venue): void
    {
        $this->venue = $venue;
    }
}
