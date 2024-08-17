<?php

namespace TelegramBotSDK\Http;

use CURLFile;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as SymfonyHttpClientInterface;
use TelegramBotSDK\HttpException;

class SymfonyHttpClient extends AbstractHttpClient
{
    /**
     * @var SymfonyHttpClientInterface
     */
    private SymfonyHttpClientInterface $http;

    public function __construct(SymfonyHttpClientInterface $http)
    {
        $this->http = $http;
    }

    /**
     * @inheritDoc
     * @throws HttpException|ExceptionInterface
     */
    protected function doRequest(string $url, ?array $data = null): array
    {
        $options = [];
        if ($data) {
            $method = 'POST';

            $data = array_filter($data);
            foreach ($data as &$value) {
                if ($value instanceof CURLFile) {
                    $value = DataPart::fromPath($value->getFilename());
                } elseif (!is_string($value) && !is_array($value)) {
                    $value = (string) $value;
                }
            }
            $formData = new FormDataPart($data);

            $options['headers'] = $formData->getPreparedHeaders()->toArray();
            $options['body'] = $formData->toIterable();
        } else {
            $method = 'GET';
        }

        $response = $this->http->request($method, $url, $options);

        try {
            return $response->toArray();
        } catch (ExceptionInterface $exception) {
            if ($exception instanceof HttpExceptionInterface) {
                $response = $exception->getResponse()->toArray(false);
                $message = array_key_exists('description', $response) ? $response['description'] : $exception->getMessage();
                $parameters = array_key_exists('parameters', $response) ? $response['parameters'] : [];
            } else {
                $message = $exception->getMessage();
                $parameters = [];
            }

            throw new HttpException($message, $exception->getCode(), $exception, $parameters);
        }
    }

    /**
     * @inheritDoc
     * @throws HttpException
     */
    protected function doDownload(string $url): string
    {
        try {
            return $this->http->request('GET', $url)->getContent();
        } catch (ExceptionInterface $exception) {
            throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
