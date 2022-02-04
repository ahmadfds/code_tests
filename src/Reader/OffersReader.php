<?php

namespace Metro\Reader;

use Metro\Collection\OfferCollection;
use Metro\Contract\IOfferCollection;
use Metro\Contract\IOffersReader;
use Metro\Contract\IResource;
use Metro\Entity\Offer;

class OffersReader implements IOffersReader
{
    public function read(IResource $resource): IOfferCollection
    {
        $json = $resource->read();
        $aOffers = json_decode($json, true);
        $mappedEntities = [];
        foreach($aOffers as $aOffer) {
            $oOffer = new Offer();
            $oOffer->setOfferId($aOffer['offerId']);
            $oOffer->setProductTitle($aOffer['productTitle']);
            $oOffer->setVendorId($aOffer['vendorId']);
            $oOffer->setPrice($aOffer['price']);
            $mappedEntities[] = $oOffer;
        }
        return new OfferCollection($mappedEntities);
    }
}