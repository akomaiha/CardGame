<?php
namespace App\Service;

use App\Service\Deck\Hand;
use App\Service\Exception\InvalidGameId;
use App\Service\Game\Game;
use App\Service\Utils\CardUtils;

class Play
{
    private Game $game;
    const HAND_SIZE = 10;

    /**
     * @return Game
     */
    public function initGame(): Game
    {
        $game = new Game();
        $this->game = $game;
        return $game;
    }

    /**
     * @return Hand
     */
    public function serveHand(): Hand
    {
        return $this->serveHandWithinGame($this->game);
    }

    /**
     * @param Game $game
     * @return Hand
     */
    private function serveHandWithinGame(Game $game): Hand
    {
        $deck = CardUtils::generateAllDeckCards();
        shuffle($deck);
        $shuffledCards = array_slice($deck, 0, self::HAND_SIZE);
        return new Hand($shuffledCards, $game->sortCards($shuffledCards));
    }
}
