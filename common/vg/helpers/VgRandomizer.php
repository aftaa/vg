<?php

namespace common\vg\helpers;

class VgRandomizer
{
    /** @var array */
    private array $randomValues = [];
    /** @var int */
    private int $min = 0;
    /** @var int */
    private int $max = PHP_INT_MAX;

    /**
     * Randomer constructor.
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @param int $number
     * @return array
     */
    public function getRandomValues(int $number): array
    {
        for ($i = 0; $i < $number; $i++) {
            $this->getRandomValue();
        }
        return $this->randomValues;
    }

    /**
     * @return int
     */
    public function getRandomValue(): int
    {
        do {
            $randomValue = mt_rand($this->min, $this->max);
        } while (in_array($randomValue, $this->randomValues));
        $this->randomValues[] = $randomValue;
        return $randomValue;
    }
}
