<?php

declare(strict_types=1);

namespace JviguyGames\DCord\Embeds;


class EmbedField extends EmbedMember
{
    /** @var string $name */
    private $name;

    /** @var string $content */
    private $content;

    /** @var bool $inline */
    private $inline;

    public function __construct(string $name, string $content, bool $inline = false) {
        $this->name = $name;
        $this->content = $content;
        $this->inline = $inline;
    }

    public function GetName(): string {
        return $this->name;
    }

    public function GetContent(): string {
        return $this->content;
    }

    public function IsInline(): bool {
        return $this->inline;
    }

    public function SetName(string $name) {
        $this->name = $name;
    }

    public function SetContent(string $content) {
        $this->content = $content;
    }

    public function SetInline(bool $inline) {
        $this->inline = $inline;
    }

    public function Marshal()
    {
        $this["name"] = $this->name;
        $this["content"] = $this->content;
        $this["inline"] = $this->inline;
    }

    public function UnMarshal()
    {
        unset($this["name"]);
        unset($this["content"]);
        unset($this["inline"]);
    }

    public function GetMemberName(): string
    {
        return "field";
    }
}