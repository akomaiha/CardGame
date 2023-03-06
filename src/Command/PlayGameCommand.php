<?php

namespace App\Command;

use App\Service\Play;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:play-game',
    description: 'Add a short description for your command',
)]
class PlayGameCommand extends Command
{
    public $gameService;

    public function __construct(Play $gameService)
    {
        $this->gameService = $gameService;
        parent::__construct();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $game = $this->gameService->initGame();
        $hand = $this->gameService->serveHand();

        $io->info("L'ordre des couleurs est :" .  $game->getOrder()->showColorsOrder());
        $io->info("L'ordre des valeurs est :" . $game->getOrder()->showValuesOrder());
        $io->info("La main de 10 cartes de manière aléatoire :" . $hand->showShuffledCards());
        $io->info("La main de 10 cartes de manière triée :" . $hand->showSortedCards());

        return Command::SUCCESS;
    }
}
