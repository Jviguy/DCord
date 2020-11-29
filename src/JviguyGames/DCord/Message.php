<?php

declare(strict_types=1);

namespace JviguyGames\DCord;

use JsonSerializable;
use JviguyGames\DCord\Embeds\Embed;

class Message implements JsonSerializable
{

    /** @var  string[]|string[][]|bool $json  */
    private $json;

    public function jsonSerialize()
    {
        return $this->json;
    }

    public function setContent(string $content): void{
        $this->json["content"] = $content;
    }

    public function getContent(): ?string {
        return $this->json["content"];
    }

    public function getUsername(): ?string{
        return $this->json["username"];
    }

    public function setUsername(string $username): void{
        $this->json["username"] = $username;
    }

    public function getAvatarURL(): ?string {
        return $this->json["avatar_url"];
    }

    public function setAvatarURL(string $avatarURL): void{
        $this->json["avatar_url"] = $avatarURL;
    }

    public function addEmbed(Embed $embed):void{
        if(!empty($embed)){
            $this->json["embeds"][] = $embed;
        }
    }

    public function setTextToSpeech(bool $ttsEnabled): void {
        $this->json["tts"] = $ttsEnabled;
    }
}