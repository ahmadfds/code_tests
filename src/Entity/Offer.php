<?php

namespace Metro\Entity;

use Metro\Contract\IOffer;

class Offer implements IOffer
{

    private $offerId;
    private $productTitle;
    private $vendorId;
    private $price;

    public function getOfferId(): int
    {
        return $this->offerId;
    }

    public function setOfferId(int $offerId): void
    {
        $this->offerId = $offerId;
    }

    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    public function setProductTitle(string $title): void
    {
        $this->productTitle = $title;
    }

    public function getVendorId(): int
    {
        return $this->vendorId;
    }

    public function setVendorId(int $vendorId): void
    {
        $this->vendorId = $vendorId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}