<?php

namespace Metro\Contract;

interface IOffersReader
{
    public function read(IResource $resource):IOfferCollection;
}