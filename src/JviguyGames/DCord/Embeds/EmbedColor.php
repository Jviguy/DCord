<?php

declare(strict_types=1);

namespace JviguyGames\DCord\Embeds;


use pocketmine\utils\Color;

class EmbedColor extends Color
{
    public function toInteger(): int {
        return 256*256*$this->r+256*$this->g+$this->b;
    }
}