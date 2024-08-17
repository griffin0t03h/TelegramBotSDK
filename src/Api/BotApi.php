<?php

namespace TelegramBotSDK\Api;

use TelegramBotSDK\Api\Service\BotService;
use TelegramBotSDK\Api\Service\ChatManagementService;
use TelegramBotSDK\Api\Service\ContentService;
use TelegramBotSDK\Api\Service\GameService;
use TelegramBotSDK\Api\Service\InlineModeService;
use TelegramBotSDK\Api\Service\PaymentService;
use TelegramBotSDK\Api\Service\StickerService;
use TelegramBotSDK\Api\Service\UpdateMessageService;
use TelegramBotSDK\Api\Service\UpdateService;
use TelegramBotSDK\Enum\ParseMode;
use TelegramBotSDK\Exception;
use TelegramBotSDK\Http\CurlHttpClient;
use TelegramBotSDK\Http\HttpClientInterface;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\ArrayOfMessageEntity;
use TelegramBotSDK\Types\ForceReply;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\LinkPreviewOptions;
use TelegramBotSDK\Types\Message;
use TelegramBotSDK\Types\ReplyKeyboardMarkup;
use TelegramBotSDK\Types\ReplyKeyboardRemove;
use TelegramBotSDK\Types\ReplyParameters;

/**
 * Class BotApi
 *
 * @package TelegramBotSDK
 */
class BotApi
{
    /**
     * Url prefixes
     */
    const URL_PREFIX = 'https://api.telegram.org/bot';

    /**
     * Url prefix for files
     */
    const FILE_URL_PREFIX = 'https://api.telegram.org/file/bot';

    /**
     * @var string
     */
    private string $token;

    /**
     * @var string|null
     */
    private ?string $endpoint;

    /**
     * @var HttpClientInterface|CurlHttpClient
     */
    private HttpClientInterface|CurlHttpClient $httpClient;

    /**
     * @var UpdateService|null
     */
    private ?UpdateService $updateService = null;

    /**
     * @var ContentService|null
     */
    private ?ContentService $contentService = null;

    /**
     * @var UpdateMessageService|null
     */
    private ?UpdateMessageService $updateMessageService = null;

    /**
     * @var InlineModeService|null
     */
    private ?InlineModeService $inlineModeService = null;

    /**
     * @var ChatManagementService|null
     */
    private ?ChatManagementService $chatManagementService = null;

    /**
     * @var BotService|null
     */
    private ?BotService $botService = null;

    /**
     * @var GameService|null
     */
    private ?GameService $gameService = null;

    /**
     * @var PaymentService|null
     */
    private ?PaymentService $paymentService = null;

    /**
     * @var StickerService|null
     */
    private ?StickerService $stickerService = null;

    /**
     * @param string $token Telegram Bot API token
     * @param HttpClientInterface|null $httpClient
     * @param string|null $endpoint
     */
    public function __construct(
        string $token,
        ?HttpClientInterface $httpClient = null,
        string $endpoint = null,
    ) {
        $this->token = $token;
        $this->endpoint = $endpoint;
        $this->httpClient = $httpClient ?: new CurlHttpClient();
    }

    /**
     * @return UpdateService
     * @throws InvalidArgumentException
     */
    public function getUpdateService(): UpdateService
    {
        return $this->getService('UpdateService');
    }

    /**
     * @param string $serviceName
     * @return mixed
     * @throws InvalidArgumentException
     */
    private function getService(string $serviceName): mixed
    {
        $variableName = lcfirst($serviceName);
        if ($this->$variableName === null) {
            $className = '\\TelegramBotSDK\\Api\\Service\\' . $serviceName;
            if (!class_exists($className)) {
                throw new InvalidArgumentException("Class $className does not exist.");
            }
            $this->$variableName = new $className($this->token, $this->httpClient, $this->endpoint);
        }

        return $this->$variableName;
    }

    /**
     * @return ContentService
     */
    public function getContentService(): ContentService
    {
        return $this->getService('ContentService');
    }

    /**
     * @return UpdateMessageService
     */
    public function getUpdateMessageService(): UpdateMessageService
    {
        return $this->getService('UpdateMessageService');
    }

    /**
     * @return InlineModeService
     */
    public function getInlineModeService(): InlineModeService
    {
        return $this->getService('InlineModeService');
    }

    /**
     * @return ChatManagementService
     */
    public function getChatManagementService(): ChatManagementService
    {
        return $this->getService('ChatManagementService');
    }

    /**
     * @return BotService
     */
    public function getBotService(): BotService
    {
        return $this->getService('BotService');
    }

    /**
     * @return GameService
     */
    public function getGameService(): GameService
    {
        return $this->getService('GameService');
    }

    /**
     * @return PaymentService
     */
    public function getPaymentService(): PaymentService
    {
        return $this->getService('PaymentService');
    }

    /**
     * @return StickerService
     */
    public function getStickerService(): StickerService
    {
        return $this->getService('StickerService');
    }

    /**
     * Use this method to send text messages.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendmessage
     *
     * @param float|int|string $chatId Unique identifier for the target chat or username of the target channel (in the
     *                                 format @channelusername)
     * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
     * @param ParseMode|null $parseMode Mode for parsing entities in the message text.
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup Additional
     *                                                                                                  interface
     *                                                                                                  options. A object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or
     *                                                                                                  to force a reply from the user
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the
     *                                          message will be sent
     * @param string|null $messageEffectId Unique identifier of the message effect to be added to the message; for
     *                                     private chats only
     * @param ArrayOfMessageEntity|null $entities list of special entities that appear in message text, which can be
     *                                            specified instead of parse_mode
     * @param LinkPreviewOptions|null $linkPreviewOptions Link preview generation options for the message.
     * @param ReplyParameters|null $replyParameters Description of the message to reply to
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendMessage(
        float|int|string $chatId,
        string $text,
        ?ParseMode $parseMode = null,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ArrayOfMessageEntity $entities = null,
        ?LinkPreviewOptions $linkPreviewOptions = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply|null $replyMarkup = null,
    ): Message {
        return $this->getContentService()->sendMessage(
            chatId: $chatId,
            text: $text,
            parseMode: $parseMode,
            disableNotification: $disableNotification,
            protectContent: $protectContent,
            messageThreadId: $messageThreadId,
            businessConnectionId: $businessConnectionId,
            messageEffectId: $messageEffectId,
            entities: $entities,
            linkPreviewOptions: $linkPreviewOptions,
            replyParameters: $replyParameters,
            replyMarkup: $replyMarkup,
        );
    }
}
