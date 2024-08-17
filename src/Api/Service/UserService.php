<?php

namespace TelegramBotSDK\Api\Service;

use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\UserProfilePhotos;

class UserService extends BaseService
{
    /**
     * Use this method to get a list of profile pictures for a user.
     *
     * @see https://core.telegram.org/bots/api#getuserprofilephotos
     *
     * @param int $userId
     * @param int $offset Sequential number of the first photo to be returned. By default, all photos are returned.
     * @param int $limit Limits the number of photos to be retrieved. Values between 1-100 are accepted.
     *
     * @return UserProfilePhotos
     * @throws Exception|HttpException|InvalidJsonException|InvalidArgumentException
     */
    public function getUserProfilePhotos(int $userId, int $offset = 0, int $limit = 100): UserProfilePhotos
    {
        return UserProfilePhotos::fromResponse($this->call('getUserProfilePhotos', [
            'user_id' => $userId,
            'offset' => $offset,
            'limit' => $limit,
        ]));
    }
}
