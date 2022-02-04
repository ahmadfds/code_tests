<?php

namespace Metro\Facade;

use Metro\Contract\ILogger;
use Metro\Contract\IOffersReader;
use Metro\Contract\IResource;

class OfferFacade
{

    private IOffersReader $offersReader;
    private IResource $resource;
    private ILogger $logger;

    public function __construct(IOffersReader $offersReader, IResource $resource, ILogger $logger)
    {
        $this->offersReader = $offersReader;
        $this->resource = $resource;
        $this->logger = $logger;
    }

    public function countByPriceRange(float $fromPrice, float $toPrice):int
    {
        $this->logger->info("Counting by price range [{$fromPrice}, {$toPrice}]");
        $this->logger->info("Getting offer collection...");
        $offerCollection = $this->offersReader->read($this->resource);

        $this->logger->info("Filtering offers...");
        $counter = 0;
        foreach ($offerCollection->getIterator() as $offer) {
            if($offer->getPrice() >= $fromPrice && $offer->getPrice() <= $toPrice) {
                $counter++;
            }
        }

        $this->logger->info("{$counter} Matches found");
        return $counter;
    }

    public function countByVendor(int $vendorId):int
    {
        $this->logger->info("Counting by vendor ID [$vendorId]");
        $this->logger->info("Getting offer collection...");
        $offerCollection = $this->offersReader->read($this->resource);
        $counter = 0;

        $this->logger->info("Filtering offers...");
        foreach ($offerCollection->getIterator() as $offer) {
            if($offer->getVendorId() == $vendorId) {
                $counter++;
            }
        }

        $this->logger->info("{$counter} Matches found");
        return $counter;
    }
}