<?php

namespace TelegramBotSDK\Api\Service;

use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\ForceReply;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Message;
use TelegramBotSDK\Types\Payments\ArrayOfLabeledPrice;
use TelegramBotSDK\Types\Payments\StarTransactions;
use TelegramBotSDK\Types\ReplyKeyboardMarkup;
use TelegramBotSDK\Types\ReplyKeyboardRemove;
use TelegramBotSDK\Types\ReplyParameters;

class PaymentService extends BaseService
{
    /**
     * Use this method to send invoices.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendinvoice
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format
     * @channelusername)
     * @param string $title Product name, 1-32 characters
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for
     *                        your internal processes.
     * @param ArrayOfLabeledPrice $prices Price breakdown, list of components (e.g. product price, tax, discount,
     *                                    delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for
     *                                    payments in Telegram Stars.
     * @param string $currency Three-letter ISO 4217 currency code, [more on
     *                         currencies](https://core.telegram.org/bots/payments#supported-currencies). Pass “XTR”
     *                         for payments in Telegram Stars.
     * @param int $maxTipAmount The maximum accepted amount for tips in the smallest units of the currency (integer,
     *                          not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount =
     *                          145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each
     *                          currency (2 for the majority of currencies). Not supported for payments in Telegram Stars.
     * @param array|null $suggestedTipAmounts array of suggested amounts of tips in the smallest units of the currency
     *                                        (integer, not float/double). At most 4 suggested tip amounts can be
     *                                        specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not
     *                                        exceed max_tip_amount.
     * @param string|null $startParameter Unique deep-linking parameter. If left empty, forwarded copies of the sent
     *                                    message will have a Pay button, allowing multiple users to pay directly from
     *                                    the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have
     *                                    a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start
     *                                    parameter
     * @param string|null $providerData JSON-serialized data about the invoice, which will be shared with the payment
     *                                  provider. A detailed description of required fields should be provided by the
     *                                  payment provider.
     * @param string|null $photoUrl URL of the product photo for the invoice. Can be a photo of the goods or a
     *                              marketing image for a service. People like it better when they see what they are
     *                              paying for.
     * @param int|null $photoSize Photo size in bytes
     * @param int|null $photoWidth Photo width
     * @param int|null $photoHeight Photo height
     * @param bool $needName Pass True if you require the user's full name to complete the order. Ignored for payments
     *                       in Telegram Stars.
     * @param bool $needPhoneNumber Pass True if you require the user's phone number to complete the order. Ignored for
     *                              payments in Telegram Stars.
     * @param bool $needEmail Pass True if you require the user's email address to complete the order. Ignored for
     *                        payments in Telegram Stars.
     * @param bool $needShippingAddress Pass True if you require the user's shipping address to complete the order.
     *                                  Ignored for payments in Telegram Stars.
     * @param bool $sendPhoneNumberToProvider Pass True if the user's phone number should be sent to the provider.
     *                                        Ignored for payments in Telegram Stars.
     * @param bool $sendEmailToProvider Pass True if the user's email address should be sent to the provider. Ignored
     *                                  for payments in Telegram Stars.
     * @param bool $isFlexible Pass True if the final price depends on the shipping method. Ignored for payments in
     *                         Telegram Stars.
     * @param string $providerToken Payment provider token, obtained via @BotFather. Pass an empty string for payments
     *                              in Telegram Stars.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param string|null $messageEffectId Unique identifier of the message effect to be added to the message; for
     *                                     private chats only
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param ReplyParameters|null $replyParameters Description of the message to reply to.
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup AN object for
     *                                                                                                  an inline
     *                                                                                                  keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay
     *                                                                                                  button.
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendInvoice(
        int|string $chatId,
        string $title,
        string $description,
        string $payload,
        ArrayOfLabeledPrice $prices,
        string $currency = 'XTR',
        int $maxTipAmount = 0,
        ?array $suggestedTipAmounts = null,
        ?string $startParameter = null,
        ?string $providerData = null,
        ?string $photoUrl = null,
        ?int $photoSize = null,
        ?int $photoWidth = null,
        ?int $photoHeight = null,
        bool $needName = false,
        bool $needPhoneNumber = false,
        bool $needEmail = false,
        bool $needShippingAddress = false,
        bool $sendPhoneNumberToProvider = false,
        bool $sendEmailToProvider = false,
        bool $isFlexible = false,
        string $providerToken = '',
        bool $disableNotification = false,
        ?int $messageThreadId = null,
        ?string $messageEffectId = null,
        bool $protectContent = false,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendInvoice', [
            'chat_id' => $chatId,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $providerToken,
            'currency' => $currency,
            'prices' => $prices->toJson(),
            'max_tip_amount' => $maxTipAmount,
            'suggested_tip_amounts' => $suggestedTipAmounts,
            'start_parameter' => $startParameter,
            'provider_data' => $providerData,
            'photo_url' => $photoUrl,
            'photo_size' => $photoSize,
            'photo_width' => $photoWidth,
            'photo_height' => $photoHeight,
            'need_name' => $needName,
            'need_phone_number' => $needPhoneNumber,
            'need_email' => $needEmail,
            'need_shipping_address' => $needShippingAddress,
            'send_phone_number_to_provider' => $sendPhoneNumberToProvider,
            'send_email_to_provider' => $sendEmailToProvider,
            'is_flexible' => $isFlexible,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_thread_id' => $messageThreadId,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters?->toJson(),
            'reply_markup' => $replyMarkup?->toJson(),
        ]));
    }

    /**
     * Use this method to create a link for an invoice.
     * Returns the created invoice link as String on success.
     *
     * @see https://core.telegram.org/bots/api#createinvoicelink
     *
     * @param int|string $chatId
     * @param string $title Product name, 1-32 characters
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for
     *                        your internal processes.
     * @param ArrayOfLabeledPrice $prices Price breakdown, list of components (e.g. product price, tax, discount,
     *                                    delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for
     *                                    payments in Telegram Stars.
     * @param string $currency Three-letter ISO 4217 currency code, [more on
     *                         currencies](https://core.telegram.org/bots/payments#supported-currencies). Pass “XTR”
     *                         for payments in Telegram Stars.
     * @param string $providerToken Payment provider token, obtained via @BotFather. Pass an empty string for payments
     *                              *     in Telegram Stars.
     * @param int $maxTipAmount The maximum accepted amount for tips in the smallest units of the currency (integer,
     *                          not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount =
     *                          145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each
     *                          currency (2 for the majority of currencies). Not supported for payments in Telegram Stars.
     * @param array|null $suggestedTipAmounts array of suggested amounts of tips in the smallest units of the currency
     *                                        (integer, not float/double). At most 4 suggested tip amounts can be
     *                                        specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not
     *                                        exceed max_tip_amount.
     * @param string|null $providerData JSON-serialized data about the invoice, which will be shared with the payment
     *                                  provider. A detailed description of required fields should be provided by the
     *                                  payment provider.
     * @param string|null $photoUrl URL of the product photo for the invoice. Can be a photo of the goods or a
     *                              marketing image for a service. People like it better when they see what they are
     *                              paying for.
     * @param int|null $photoSize Photo size in bytes
     * @param int|null $photoWidth Photo width
     * @param int|null $photoHeight Photo height
     * @param bool $needName Pass True if you require the user's full name to complete the order. Ignored for payments
     *                       in Telegram Stars.
     * @param bool $needPhoneNumber Pass True if you require the user's phone number to complete the order. Ignored for
     *                              payments in Telegram Stars.
     * @param bool $needEmail Pass True if you require the user's email address to complete the order. Ignored for
     *                        payments in Telegram Stars.
     * @param bool $needShippingAddress Pass True if you require the user's shipping address to complete the order.
     *                                  Ignored for payments in Telegram Stars.
     * @param bool $sendPhoneNumberToProvider Pass True if the user's phone number should be sent to the provider.
     *                                        Ignored for payments in Telegram Stars.
     * @param bool $sendEmailToProvider Pass True if the user's email address should be sent to the provider. Ignored
     *                                  for payments in Telegram Stars.
     * @param bool $isFlexible Pass True if the final price depends on the shipping method. Ignored for payments in
     *                         Telegram Stars.
     * @return string
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function createInvoiceLink(
        int|string $chatId,
        string $title,
        string $description,
        string $payload,
        ArrayOfLabeledPrice $prices,
        string $currency = 'XTR',
        string $providerToken = '',
        int $maxTipAmount = 0,
        ?array $suggestedTipAmounts = null,
        ?string $providerData = null,
        ?string $photoUrl = null,
        ?int $photoSize = null,
        ?int $photoWidth = null,
        ?int $photoHeight = null,
        bool $needName = false,
        bool $needPhoneNumber = false,
        bool $needEmail = false,
        bool $needShippingAddress = false,
        bool $sendPhoneNumberToProvider = false,
        bool $sendEmailToProvider = false,
        bool $isFlexible = false,
    ): string {
        return $this->call('createInvoiceLink', [
            'chat_id' => $chatId,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $providerToken,
            'currency' => $currency,
            'prices' => $prices->toJson(),
            'max_tip_amount' => $maxTipAmount,
            'suggested_tip_amounts' => $suggestedTipAmounts ?? json_encode($suggestedTipAmounts),
            'provider_data' => $providerData,
            'photo_url' => $photoUrl,
            'photo_size' => $photoSize,
            'photo_width' => $photoWidth,
            'photo_height' => $photoHeight,
            'need_name' => $needName,
            'need_phone_number' => $needPhoneNumber,
            'need_email' => $needEmail,
            'need_shipping_address' => $needShippingAddress,
            'send_phone_number_to_provider' => $sendPhoneNumberToProvider,
            'send_email_to_provider' => $sendEmailToProvider,
            'is_flexible' => $isFlexible,
        ]);
    }

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API
     * will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries.
     *
     * @see https://core.telegram.org/bots/api#answershippingquery
     *
     * @param string $shippingQueryId Unique identifier for the query to be answered
     * @param bool $ok Pass True if delivery to the specified address is possible and False if there are any problems
     *                 (for example, if delivery to the specified address is not possible)
     * @param array $shippingOptions Required if ok is True. AN array of available shipping options.
     * @param string|null $errorMessage Required if ok is False. Error message in human-readable form that explains why
     *                                  it is impossible to complete the order (e.g. "Sorry, delivery to your desired
     *                                  address is unavailable'). Telegram will display this message to the user.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function answerShippingQuery(
        string $shippingQueryId,
        bool $ok = true,
        array $shippingOptions = [],
        string $errorMessage = null,
    ): bool {
        return $this->call('answerShippingQuery', [
            'shipping_query_id' => $shippingQueryId,
            'ok' => $ok,
            'shipping_options' => json_encode($shippingOptions),
            'error_message' => $errorMessage,
        ]);
    }

    /**
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the
     * form of an Update with the field pre_checkout_query.
     * Use this method to respond to such pre-checkout queries.
     * Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     *
     * @see https://core.telegram.org/bots/api#answerprecheckoutquery
     *
     * @param string $preCheckoutQueryId Unique identifier for the query to be answered
     * @param bool $ok Specify True if everything is alright (goods are available, etc.) and the bot is ready to
     *                 proceed with the order. Use False if there are any problems.
     * @param string|null $errorMessage Required if ok is False. Error message in human-readable form that explains the
     *                                  reason for failure to proceed with the checkout (e.g. "Sorry, somebody just
     *                                  bought the last of our amazing black T-shirts while you were busy filling out your payment details. Please
     *                                  choose a different color or garment!"). Telegram will display this message to the user.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function answerPreCheckoutQuery(string $preCheckoutQueryId, bool $ok = true, string $errorMessage = null): bool
    {
        return $this->call('answerPreCheckoutQuery', [
            'pre_checkout_query_id' => $preCheckoutQueryId,
            'ok' => $ok,
            'error_message' => $errorMessage,
        ]);
    }

    /**
     * Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions
     * object.
     *
     * @see https://core.telegram.org/bots/api#getstartransactions
     *
     * @param int|null $offset Number of transactions to skip in the response
     * @param int $limit The maximum number of transactions to be retrieved. Values between 1-100 are accepted.
     *
     * @return StarTransactions
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function getStarTransactions(?int $offset = null, int $limit = 100): StarTransactions
    {
        return StarTransactions::fromResponse($this->call('getStarTransactions', [
            'offset' => $offset,
            'limit' => $limit,
        ]));
    }

    /**
     * Refunds a successful payment in Telegram Stars.
     *
     * @see https://core.telegram.org/bots/api#refundstarpayment
     *
     * @param int $userId Identifier of the user whose payment will be refunded
     * @param string $telegramPaymentChargeId Telegram payment identifier
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function refundStarPayment(int $userId, string $telegramPaymentChargeId): bool
    {
        return $this->call('refundStarPayment', [
            'user_id' => $userId,
            'telegram_payment_charge_id' => $telegramPaymentChargeId,
        ]);
    }
}
