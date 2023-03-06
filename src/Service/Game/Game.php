<?php

namespace App\Service\Game;

class Game
{
    private string $id;
    private Order $order;

    public function __construct()
    {
        $this->order = new Order();
    }


    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return Game
     */
    public function setOrder(Order $order): Game
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return array
     */
    public function getColorsOrder(): array
    {
        return $this->order->getColorsOrder();
    }

    /**
     * @return array
     */
    public function getValuesOrder(): array
    {
        return $this->order->getValuesOrder();
    }

    /**
     * sort cards
     * @param array $shuffledCards
     * @return array
     */
    public function sortCards(array $shuffledCards): array
    {
        $shuffledCardList = [];
        $shuffledCardSortedList = [];
        $comparator = $this->getComparator();
        foreach ($this->getColorsOrder() as $colorOrder) {
            foreach ($shuffledCards as $shuffledCard) {
                if ($colorOrder === $shuffledCard->getColor()) {
                    $shuffledCardList[$colorOrder->getName()][] = $shuffledCard;
                }
            }
        }

        foreach ($shuffledCardList as $key => $shuffledCard) {
            usort($shuffledCard, fn($a, $b) => $comparator($a, $b));
            foreach ($shuffledCard as $shuffledCardSorted) {
                $shuffledCardSortedList[] = $shuffledCardSorted;
            }
        }
        return $shuffledCardSortedList;
    }

    /**
     * compare cards value to sort
     * @return callable
     */
    private function getComparator(): callable
    {
        $valuesOrder = $this->getValuesOrder();
        return fn($a, $b) => $valuesOrder[array_search($a->getValue(), $valuesOrder)] <=> $valuesOrder[array_search($b->getValue(), $valuesOrder)];
    }
}