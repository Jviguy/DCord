<?php

declare(strict_types=1);

namespace JviguyGames\DCord\Embeds;

class EmbedFields extends EmbedMember
{
    /** @var EmbedField[] $fields*/
    private $fields;

    public function __construct(EmbedField ...$fields) {
        $this->fields = $fields;
    }

    /**
     * @return EmbedField[]
     */
    public function GetFields(): array {
        return $this->fields;
    }

    public function AddField(EmbedFields $field) {
        $this->fields[] = $field;
    }

    public function RemoveField(int $fieldnumber) {
        unset($this->fields[$fieldnumber]);
    }

    public function Marshal()
    {
        foreach ($this->fields as $field) {
            $field->Marshal();
        }
    }

    public function UnMarshal()
    {
        foreach ($this->fields as $field) {
            $field->UnMarshal();
        }
    }

    public function GetMemberName(): string
    {
        return "fields";
    }
}