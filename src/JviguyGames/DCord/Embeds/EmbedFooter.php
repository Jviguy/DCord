<?php

declare(strict_types=1);

namespace JviguyGames\DCord\Embeds;

class EmbedFooter extends EmbedMember
{

    /** @var string $text */
    private $text;

    /** @var string $iconurl */
    private $iconurl;

    public function __construct(string $text, string $iconurl = null)
    {
        $this->text = $text;
        $this->iconurl = $iconurl;
    }

    public function SetText(string $text) {
        $this->text = $text;
    }

    public function GetText(): string {
        return $this->text;
    }

    public function SetIconUrl(string $url) {
        $this->iconurl = $url;
    }

    public function GetIconUrl(): string {
        return $this->text;
    }

    public function Marshal()
    {
        $this["text"] = $this->text;
        if (isset($this->iconurl)) $this["icon_url"] = $this->iconurl;
    }

    public function UnMarshal()
    {
        unset($this["text"]);
        unset($this["icon_url"]);
    }

    public function GetMemberName(): string
    {
        return "footer";
    }
}