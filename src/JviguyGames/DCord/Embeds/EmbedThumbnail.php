<?php

declare(strict_types=1);

namespace JviguyGames\DCord\Embeds;

class EmbedThumbnail extends EmbedMember
{
    /** @var string $url the Thumbnail url */
    private $url;

    public function __construct(string $url) {
        $this->url = $url;
    }

    public function SetUrl(string $url) {
        $this->url = $url;
    }

    public function GetUrl(): string {
        return $this->url;
    }

    public function Marshal()
    {
        $this["url"] = $this->url;
    }

    public function UnMarshal()
    {
        unset($this["url"]);
    }

    public function GetMemberName(): string
    {
        return "thumbnail";
    }
}