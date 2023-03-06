<?php
namespace App\Service\Game;

use App\Service\Deck\Color;
use phpDocumentor\Reflection\Types\This;

class Order
{
    private const MIN_VALUE_INCLUSIVE = 1;
    private const MAX_VALUE_EXCLUSIVE = 13;

    private static array $colors = [];

    private array $colorsOrder;
    private array $valuesOrder;

    public function __construct()
    {
        $this->colorsOrder = self::getShuffledColors();
        $this->valuesOrder = self::getRandomValues();
    }

    /**
     * @return array
     */
    private static function getShuffledColors(): array
    {
        if (empty(self::$colors)) {
            self::$colors = array_values(Color::cases());
            shuffle(self::$colors);
        }
        return self::$colors;
    }

    /**
     * @return array
     */
    private static function getRandomValues(): array
    {
        $numbers = range(self::MIN_VALUE_INCLUSIVE, self::MAX_VALUE_EXCLUSIVE);
        shuffle($numbers);

        return $numbers;
    }

    /**
     * @return array
     */
    public function getColorsOrder(): array
    {
        return $this->colorsOrder;
    }

    /**
     * @return array
     */
    public function getValuesOrder(): array
    {
        return $this->valuesOrder;
    }

    /**
     * @return string
     */
    public function showColorsOrder(): string
    {
        $colorsOrderList =[];
        foreach ($this->colorsOrder as $colorOrder) {
            $colorsOrderList[] = $colorOrder->getName();
        }
        return implode(", " , $colorsOrderList);
    }

    public function showValuesOrder(): string
    {
        $valueOrderList =[];
        foreach ($this->valuesOrder as $valueOrder) {
            switch ($valueOrder) {
                case 1:
                    $value = 'As';
                    break;
                case 11:
                    $value = 'Valet';
                    break;
                case 12:
                    $value = 'Dame';
                    break;
                case 13:
                    $value = 'Roi';
                    break;
                default:
                    $value = $valueOrder;
            }
            $valueOrderList[] = $value;
        }
        return implode(", " , $valueOrderList);
    }
}
