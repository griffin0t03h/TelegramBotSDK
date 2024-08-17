<?php

namespace TelegramBotSDK\Http;

use TelegramBotSDK\Exception;

abstract class AbstractHttpClient implements HttpClientInterface
{
    public function request(string $url, ?array $data = null): mixed
    {
        $response = $this->doRequest($url, $data);

        if (!isset($response['ok']) || !$response['ok']) {
            throw new Exception($response['description'], $response['error_code']);
        }

        return $response['result'];
    }

    /**
     * @param string $url
     * @param array|null $data
     * @return array
     */
    abstract protected function doRequest(string $url, ?array $data = null): array;

    /**
     * @param string $url
     * @return string
     */
    public function download(string $url): string
    {
        return $this->doDownload($url);
    }

    /**
     * @param string $url
     * @return string
     */
    abstract protected function doDownload(string $url): string;
}
