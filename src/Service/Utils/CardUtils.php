<?php

namespace App\Service\Utils;

use App\Service\Deck\Card;
use App\Service\Deck\Color;

final class CardUtils
{
    /**
     * @return array
     */
    public static function generateAllDeckCards()
    {
        return array_merge(...array_map(
            function ($value) {
                return [
                    new Card($value, Color::Clubs),
                    new Card($value, Color::Hearts),
                    new Card($value, Color::Diamonds),
                    new Card($value, Color::Spades),
                ];
            },
            range(1, 13)
        ));
    }
}
