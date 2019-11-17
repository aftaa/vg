<?php

namespace common\vg\helpers;

use yii\db\Connection;
use yii\db\Query;

class VgRandomSelectFromBigTable
{
    /** @var Query */
    private $query;

    /** @var VgRandomizer */
    private $randomizer;

    /** @var bool */
    private $shuffle = true;

    /** @var int */
    private $dispersion = 100;

    /**
     * VgGetRandomSet constructor.
     * @param Query $query
     * @param VgRandomizer $randomizer
     */
    public function __construct(Query $query, VgRandomizer $randomizer)
    {
        $this->setQuery($query);
        $this->setRandomizer($randomizer);
    }

    /**
     * @param Query $query
     */
    public function setQuery(Query $query): void
    {
        $this->query = $query;
    }

    /**
     * @param bool $shuffle
     * @return $this
     */
    public function setShuffle(bool $shuffle): self
    {
        $this->shuffle = $shuffle;
        return $this;
    }

    /**
     * @param int $dispersion
     * @return VgRandomSelectFromBigTable
     */
    public function setDispersion(int $dispersion): self
    {
        $this->dispersion = $dispersion;
        return $this;
    }

    /**
     * @param VgRandomizer $randomizer
     */
    public function setRandomizer(VgRandomizer $randomizer): void
    {
        $this->randomizer = $randomizer;
    }

    /**
     * @param int $setSize
     * @param int $batchSize
     * @param Connection|null $db
     * @return array
     */
    public function getRandom(int $setSize, $batchSize = 100, Connection $db = null)
    {
        $set = [];
        while (count($set) < $setSize) {
            $randomIds = $this->randomizer->getRandomValues($this->dispersion);
            foreach ($this->query->andWhere(['IN', 'id', $randomIds])->batch($batchSize, $db) as $rows) {
                foreach ($rows as $row) {
                    $set[] = $row;
                }
            }
        }

        if ($this->shuffle) {
            shuffle($set);
        }

        $set = array_slice($set, 0, $setSize);
        return $set;
    }
}
