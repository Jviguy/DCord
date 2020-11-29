<?php

declare(strict_types=1);

namespace JviguyGames\DCord\Embeds;

use ArrayAccess;
use JsonSerializable;
use pocketmine\utils\Color;

class Embed implements JsonSerializable {

    /** @var string[]|string[][] $json */

    private $json;

    public function SetColor(EmbedColor $color) {
        $this->json["color"] = $color->toInteger();
    }

    public function SetType(string $type) {
        $this->json["type"] = $type;
    }

    public function GetType(): string {
        return $this->json["type"];
    }

    public function SetTimestamp(string $stamp) {
        $this->json["timestamp"] = $stamp;
    }

    public function setTitle(string $title): void {
        $this->json["title"] = $title;
    }
    public function setDescription(string $description): void {
        $this->json["description"] = $description;
    }

    public function Add(EmbedMember $member) {
        $member->Marshal();
        $this->json[$member->GetMemberName()] = $member;
    }

    public function Remove(string $member) {
        $mem = $this[$member];
        unset($this[$member]);
        $mem->UnMarshal();
    }

    public function jsonSerialize()
    {
        return $this->json;
    }
}
