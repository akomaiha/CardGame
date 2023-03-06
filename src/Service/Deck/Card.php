<?php

namespace App\Service\Deck;

use Stringable;

class Card implements Stringable
{
    private int $value;
    private Color $color;
    private string $rank;

    /**
     * @param int $value
     * @param Color $color
     */
    public function __construct(int $value, Color $color)
    {
        $this->value = $value;
        $this->color = $color;
        $this->rank = $this->rank();
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Card
     */
    public function setValue(int $value): Card
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * @param Color $color
     * @return Card
     */
    public function setColor(Color $color): Card
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return string
     */
    public function getRank(): string
    {
        return $this->rank;
    }

    /**
     * @param string $rank
     * @return Card
     */
    public function setRank(string $rank): Card
    {
        $this->rank = $rank;
        return $this;
    }

    /**
     * @return CardType|null
     */
    public function getCardType(): ?CardType
    {
        return CardType::fromValue($this->value);
    }

    /**
     * @return string
     */
    public function valueName(): string
    {
        return strlen($this->getCardType()->getName()) > 0 ? $this->getCardType()?->getName() : (string)$this->value;
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return sprintf('%s de %s', $this->valueName(), $this->color->getName());
    }

    /**
     * @return string
     */
    private function rank(): string
    {
        return $this->getCardType()?->getRank() ?? (string)$this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->fullName();
    }
}
