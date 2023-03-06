<?php

namespace App\Service\Deck;

class CardType
{
    public const ACE = 'AS';
    public const JACK = 'Valet';
    public const QUEEN = 'Dame';
    public const KING = 'Roi';
    public const REGULAR = '';

    private string $name;
    private string $rank;

    private static array $values = [
        1 => [self::class, 'createAce'],
        11 => [self::class, 'createJack'],
        12 => [self::class, 'createQueen'],
        13 => [self::class, 'createKing'],
    ];

    /**
     * @param string $name
     * @param string $rank
     */
    public function __construct(string $name, string $rank)
    {
        $this->name = $name;
        $this->rank = $rank;
    }

    /**
     * Create card type
     * @param int $value
     * @return static
     */
    public static function fromValue(int $value): self
    {
        if (isset(self::$values[$value])) {
            [$class, $method] = self::$values[$value];
            return $class::$method();
        }
        return new self(self::REGULAR, (string)$value);
    }

    /**
     * @return static
     */
    private static function createAce(): self
    {
        return new self(self::ACE, 'A');
    }

    /**
     * @return static
     */
    private static function createJack(): self
    {
        return new self(self::JACK, 'J');
    }

    /**
     * @return static
     */
    private static function createQueen(): self
    {
        return new self(self::QUEEN, 'Q');
    }

    /**
     * @return static
     */
    private static function createKing(): self
    {
        return new self(self::KING, 'K');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRank(): string
    {
        return $this->rank;
    }
}
