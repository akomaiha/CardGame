<?php
namespace App\Service\Deck;

class Hand {
    private array $shuffledCards;
    private array $sortedCards;

    /**
     * @param array $shuffledCards
     * @param array $sortedCards
     */
    public function __construct(array $shuffledCards = [], array $sortedCards = []) {
        $this->shuffledCards = $shuffledCards;
        $this->sortedCards = $sortedCards;
    }

    /**
     * @return array
     */
    public function getShuffledCards(): array {
        return $this->shuffledCards;
    }

    /**
     * @return array
     */
    public function getSortedCards(): array {
        return $this->sortedCards;
    }

    /**
     * @return string
     */
    public function showShuffledCards(): string {
        $shuffledCardList = [];
        foreach ($this->shuffledCards as $shuffledCard) {
            $shuffledCardList[] = $shuffledCard;
        }
        return implode(", " , $shuffledCardList);
    }

    /**
     * @return string
     */
    public function showSortedCards(): string {
        $sortedCardList = [];
        foreach ($this->sortedCards as $sortedCard) {
            $sortedCardList[] = $sortedCard;
        }
        return implode(", " , $sortedCardList);
    }


}