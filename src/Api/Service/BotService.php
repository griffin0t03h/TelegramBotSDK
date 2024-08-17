<?php

namespace TelegramBotSDK\Api\Service;

use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\Bot\ArrayOfBotCommand;
use TelegramBotSDK\Types\Bot\BotCommandScope;
use TelegramBotSDK\Types\Bot\BotDescription;
use TelegramBotSDK\Types\Bot\BotName;
use TelegramBotSDK\Types\Bot\BotShortDescription;
use TelegramBotSDK\Types\MenuButton;
use TelegramBotSDK\Types\User;

class BotService extends BaseService
{
    /**
     * A simple method for testing your bot's auth token.
     * Returns basic information about the bot in form of a User object.
     *
     * @return User
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function getMe(): User
    {
        return User::fromResponse($this->call('getMe'));
    }

    /**
     * Use this method to change the list of the bot's commands.
     *
     * @see https://core.telegram.org/bots/api#setmycommands
     *
     * @param ArrayOfBotCommand $commands
     * @param BotCommandScope|null $scope
     * @param string|null $languageCode
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setMyCommands(
        ArrayOfBotCommand $commands,
        ?BotCommandScope $scope = null,
        ?string $languageCode = null,
    ): bool {
        return $this->call('setMyCommands', [
            'commands' => $commands->toJson(),
            'scope' => $scope?->toJson(),
            'language_code' => $languageCode,
        ]);
    }

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion,
     * higher level commands will be shown to affected users.
     *
     * @see https://core.telegram.org/bots/api#deletemycommands
     *
     * @param BotCommandScope|null $scope
     * @param string|null $languageCode
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function deleteMyCommands(
        ?BotCommandScope $scope = null,
        ?string $languageCode = null,
    ): bool {
        return $this->call('deleteMyCommands', [
            'scope' => $scope?->toJson(),
            'language_code' => $languageCode,
        ]);
    }

    /**
     * Use this method to get the current list of the bot's commands. Requires no parameters.
     *
     * @see https://core.telegram.org/bots/api#getmycommands
     *
     * @param BotCommandScope|null $scope
     * @param string|null $languageCode
     *
     * @return ArrayOfBotCommand
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function getMyCommands(
        ?BotCommandScope $scope = null,
        ?string $languageCode = null,
    ): ArrayOfBotCommand {
        return ArrayOfBotCommand::fromResponse($this->call('getMyCommands', [
            'scope' => $scope?->toJson(),
            'language_code' => $languageCode,
        ]));
    }

    /**
     * Use this method to change the bot's name.
     *
     * @see https://core.telegram.org/bots/api#setmyname
     *
     * @param string|null $name New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for
     *                          the given language.
     * @param string|null $languageCode A two-letter ISO 639-1 language code. If empty, the name will be shown to all
     *                                  users for whose language there is no dedicated name.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setMyName(
        ?string $name = null,
        ?string $languageCode = null,
    ): bool {
        return $this->call('setMyName', [
            'name' => $name,
            'language_code' => $languageCode,
        ]);
    }

    /**
     * Use this method to change the bot's name.
     *
     * @see https://core.telegram.org/bots/api#getmyname
     *
     * @param string|null $languageCode
     *
     * @return BotName
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function getMyName(?string $languageCode = null): BotName
    {
        return BotName::fromResponse($this->call('getMyName', [
            'language_code' => $languageCode,
        ]));
    }

    /**
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty.
     *
     * @see https://core.telegram.org/bots/api#setmydescription
     *
     * @param string|null $description New bot description; 0-512 characters. Pass an empty string to remove the
     *                                 dedicated description for the given language.
     * @param string|null $languageCode
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setMyDescription(
        ?string $description = null,
        ?string $languageCode = null,
    ): bool {
        return $this->call('setMyDescription', [
            'description' => $description,
            'language_code' => $languageCode,
        ]);
    }

    /**
     * Use this method to get the current bot description for the given user language.
     *
     * @see https://core.telegram.org/bots/api#getmydescription
     *
     * @param string|null $languageCode
     *
     * @return BotDescription
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function getMyDescription(?string $languageCode = null): BotDescription
    {
        return BotDescription::fromResponse(
            $this->call('getMyDescription', [
                'language_code' => $languageCode,
            ]),
        );
    }

    /**
     * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent
     * together with the link when users share the bot.
     *
     * @see https://core.telegram.org/bots/api#setmyshortdescription
     *
     * @param string|null $shortDescription New short description for the bot; 0-120 characters. Pass an empty string
     *                                      to remove the dedicated short description for the given language.
     * @param string|null $languageCode
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setMyShortDescription(
        ?string $shortDescription = null,
        ?string $languageCode = null,
    ): bool {
        return $this->call('setMyShortDescription', [
            'short_description' => $shortDescription,
            'language_code' => $languageCode,
        ]);
    }

    /**
     * Use this method to get the current bot short description for the given user language.
     *
     * @see https://core.telegram.org/bots/api#getmyshortdescription
     *
     * @param string|null $languageCode
     *
     * @return BotShortDescription
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function getMyShortDescription(?string $languageCode = null): BotShortDescription
    {
        return BotShortDescription::fromResponse(
            $this->call('getMyShortDescription', [
                'language_code' => $languageCode,
            ]),
        );
    }

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button.
     *
     * @see https://core.telegram.org/bots/api#setchatmenubutton
     *
     * @param int|null $chatId Unique identifier for the target private chat. If not specified, default bot's menu
     *                         button will be changed
     * @param MenuButton|null $menuButton
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setChatMenuButton(
        ?int $chatId = null,
        ?MenuButton $menuButton = null,
    ): bool {
        return $this->call('setChatMenuButton', [
            'chat_id' => $chatId,
            'menu_button' => $menuButton?->toJson(),
        ]);
    }

    /**
     * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button.
     *
     * @see https://core.telegram.org/bots/api#getchatmenubutton
     *
     * @param int|null $chatId
     *
     * @return MenuButton
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function getChatMenuButton(?int $chatId = null): MenuButton
    {
        return MenuButton::fromResponse(
            $this->call('getChatMenuButton', [
                'chat_id' => $chatId,
            ]),
        );
    }

}
