<?php

namespace Metro\Collection;

use Metro\Contract\IOffer;
use Metro\Contract\IOfferCollection;

class OfferCollection implements IOfferCollection
{
    protected array $offers;

    public function __construct(array $offers)
    {
        $this->offers = $offers;
    }

    public function get(int $inx): ?IOffer
    {
        return $this->offers[$inx] ?? null;
    }

    public function getIterator(): \Iterator
    {
        return new CollectionIterator($this->offers);
    }

}