<?php

namespace TelegramBotSDK\Api\Service;

use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\Inline\InlineQueryResultsButton;
use TelegramBotSDK\Types\Inline\QueryResult\AbstractInlineQueryResult;
use TelegramBotSDK\Types\SentWebAppMessage;

class InlineModeService extends BaseService
{
    /**
     * Use this method to send answers to an inline query.
     * No more than 50 results per query are allowed.
     *
     * @see https://core.telegram.org/bots/api#answerinlinequery
     *
     * @param string $inlineQueryId Unique identifier for the answered query
     * @param AbstractInlineQueryResult[] $results array of results for the inline query
     * @param int $cacheTime The maximum amount of time in seconds that the result of the inline query may be cached on
     *                       the server.
     * @param bool $isPersonal Pass True if results may be cached on the server side only for the user that sent the
     *                         query. By default, results may be returned to any user who sends the same query.
     * @param string $nextOffset Pass the offset that a client should send in the next query with the same text to
     *                           receive more results. Pass an empty string if there are no more results or if you
     *                           don't support pagination. Offset length can't exceed 64 bytes.
     * @param InlineQueryResultsButton|null $button object describing a button to be shown above inline query results
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function answerInlineQuery(
        string $inlineQueryId,
        array $results,
        int $cacheTime = 300,
        bool $isPersonal = false,
        string $nextOffset = '',
        ?InlineQueryResultsButton $button = null,
    ): bool {
        $results = array_map(
            /**
             * @param AbstractInlineQueryResult $item
             * @return array
             */
            function (AbstractInlineQueryResult $item) {
                /** @var array $array */
                $array = $item->toJson(true);

                return $array;
            },
            $results,
        );

        return $this->call('answerInlineQuery', [
            'inline_query_id' => $inlineQueryId,
            'results' => json_encode($results),
            'cache_time' => $cacheTime,
            'is_personal' => $isPersonal,
            'next_offset' => $nextOffset,
            'button' => $button?->toJson(),
        ]);
    }

    /**
     * @param string $webAppQueryId
     * @param AbstractInlineQueryResult $result
     *
     * @return SentWebAppMessage
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function answerWebAppQuery(string $webAppQueryId, AbstractInlineQueryResult $result): SentWebAppMessage
    {
        return SentWebAppMessage::fromResponse($this->call('answerWebAppQuery', [
            'web_app_query_id' => $webAppQueryId,
            'result' => $result->toJson(),
        ]));
    }
}
