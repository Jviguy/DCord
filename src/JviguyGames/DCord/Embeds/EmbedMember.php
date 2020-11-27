<?php


namespace JviguyGames\DCord\Embeds;


use ArrayAccess;
use JsonSerializable;

abstract class EmbedMember implements ArrayAccess, JsonSerializable
{
    /** @var string[] $json */
    private $json;

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->json[] = $value;
        } else {
            $this->json[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->json[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->json[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->json[$offset]) ? $this->json[$offset] : null;
    }

    public function jsonSerialize()
    {
        return $this->json;
    }

    public abstract function Marshal();

    public abstract function UnMarshal();

    public abstract function GetMemberName(): string;
}