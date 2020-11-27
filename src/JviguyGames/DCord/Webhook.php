<?php

declare(strict_types=1);

namespace JviguyGames\DCord;

use JviguyGames\DCord\Tasks\WebhookTask;
use JviguyGames\DCord\Tasks\WebhookTaskCallback;
use pocketmine\Server;

class Webhook
{

    /** @var $url string the webhook url */
    private $url;

    /**
     * Webhook constructor.
     * @param string $url the url for the webhook
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function ValidateUrl(): bool {
        return filter_var($this->url,FILTER_VALIDATE_URL) != false;
    }


    public function SendAsync(Message $message) {
        Server::getInstance()->getAsyncPool()->submitTask(new WebhookTask($this,$message));
    }

    /**
     * @param Message $message the message to be sent!
     * @param callable $callback A callback that takes 2 params of mixed|null|scalar and resource from curl
     */
    public function SendAsyncCallback(Message $message, callable $callback) {
        Server::getInstance()->getAsyncPool()->submitTask(new WebhookTaskCallback($this,$message,$callback));
    }

    public function Send(Message $message) {
        $ch = curl_init($this->getURL());
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    /**
     * @return string URL the url of the webhook
     */
    public function getURL(): string
    {
        return $this->url;
    }

}