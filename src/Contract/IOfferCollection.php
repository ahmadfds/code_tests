<?php

namespace Metro\Contract;

interface IOfferCollection
{
    public function get(int $inx): ?IOffer;

    /**
     * @return IOffer[]
     */
    public function getIterator():\Iterator;
}