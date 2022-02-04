<?php

namespace Metro\Contract;

interface IOffer
{
    public function getOfferId():int;
    public function setOfferId(int $offerId):void;

    public function getProductTitle():string;
    public function setProductTitle(string $title):void;

    public function getVendorId():int;
    public function setVendorId(int $vendorId):void;

    public function getPrice():float;
    public function setPrice(float $price):void;
}