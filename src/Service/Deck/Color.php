<?php
namespace App\Service\Deck;

enum Color {
    case Clubs;
    case Diamonds;
    case Hearts;
    case Spades;

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
}