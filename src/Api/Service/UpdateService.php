<?php

namespace TelegramBotSDK\Api\Service;

use CURLFile;
use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\ArrayOfUpdates;
use TelegramBotSDK\Types\Update;
use TelegramBotSDK\Types\WebhookInfo;

class UpdateService extends BaseService
{
    /**
     * Use this method to receive incoming updates using long polling.
     * An Array of Update objects is returned.
     *
     * Notes
     * 1. This method will not work if an outgoing webhook is set up.
     * 2. In order to avoid getting duplicate updates, recalculate offset after each server response.
     *
     * @param int $offset
     * @param int $limit
     * @param int $timeout
     *
     * @return Update[]
     * @throws Exception|HttpException|InvalidJsonException|InvalidArgumentException
     */
    public function getUpdates(int $offset = 0, int $limit = 100, int $timeout = 0): array
    {
        return ArrayOfUpdates::fromResponse($this->call('getUpdates', [
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout,
        ]));
    }

    /**
     * Use this method to specify a url and receive incoming updates via an outgoing webhook.
     * Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url,
     * containing a JSON-serialized Update.
     * In case of an unsuccessful request, we will give up after a reasonable amount of attempts.
     *
     * @param string $url HTTPS url to send updates to. Use an empty string to remove webhook integration
     * @param CURLFile|string|null $certificate Upload your public key certificate
     *                                          so that the root certificate in use can be checked
     * @param string|null $ipAddress The fixed IP address which will be used to send webhook requests
     *                               instead of the IP address resolved through DNS
     * @param int|null $maxConnections The maximum allowed number of simultaneous HTTPS connections to the webhook
     *                                 for update delivery, 1-100. Defaults to 40. Use lower values to limit
     *                                 the load on your bot's server, and higher values to increase your bot's
     *                                 throughput.
     * @param array|string|null $allowedUpdates A JSON-serialized list of the update types you want your bot to
     *                                          receive.
     *                                          For example, specify [“message”, “edited_channel_post”,
     *                                          “callback_query”] to only receive updates of these types. See Update
     *                                          for a complete list of available update types. Specify an empty list to receive all update types except
     *                                          chat_member (default). If not specified, the previous setting will be used. Please note that this parameter
     *                                          doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a
     *                                          short period of time.
     * @param bool|null $dropPendingUpdates Pass True to drop all pending updates
     * @param string|null $secretToken A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every
     *                                 webhook request,
     *                                 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed.
     *                                 The header is useful to ensure that the request comes from a webhook set by you.
     *
     * @return string
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setWebhook(
        string $url = '',
        CURLFile|string $certificate = null,
        string $ipAddress = null,
        ?int $maxConnections = 40,
        array|string $allowedUpdates = null,
        ?bool $dropPendingUpdates = false,
        string $secretToken = null,
    ): string {
        return $this->call('setWebhook', [
            'url' => $url,
            'certificate' => $certificate,
            'ip_address' => $ipAddress,
            'max_connections' => $maxConnections,
            'allowed_updates' => is_array($allowedUpdates) ? json_encode($allowedUpdates) : $allowedUpdates,
            'drop_pending_updates' => $dropPendingUpdates,
            'secret_token' => $secretToken,
        ]);
    }

    /**
     * Use this method to clear webhook and use getUpdates again!
     *
     * @param bool $dropPendingUpdates Pass True to drop all pending updates
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function deleteWebhook(bool $dropPendingUpdates = false): bool
    {
        return $this->call('deleteWebhook', [
            'drop_pending_updates' => $dropPendingUpdates,
        ]);
    }

    /**
     * Use this method to get current webhook status. Requires no parameters.
     * On success, returns a WebhookInfo object. If the bot is using getUpdates,
     * will return an object with the url field empty.
     *
     * @return WebhookInfo
     * @throws Exception|HttpException|InvalidJsonException|InvalidArgumentException
     */
    public function getWebhookInfo(): WebhookInfo
    {
        return WebhookInfo::fromResponse($this->call('getWebhookInfo'));
    }

}
