<?php

namespace common\vg\helpers;

class VgRandomizer
{
    /** @var array */
    private $randomValues = [];
    /** @var int */
    private $min = 0;
    /** @var int */
    private $max = PHP_INT_MAX;

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
