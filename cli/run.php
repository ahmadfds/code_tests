<?php

use Metro\Facade\OfferFacade;
use Metro\Logger\ConsoleLogger;
use Metro\Reader\OffersReader;
use Metro\Resource\HttpResource;

require __DIR__.'/../vendor/autoload.php';

$strategy = $argv[1] ?? '';
$arg1 = $argv[2] ?? '';
$arg2 = $argv[3] ?? '';

$logger = new ConsoleLogger();
$offersReader = new OffersReader();
$resource = new HttpResource('http://localhost/dummy/offers.json', 'get');
$offerFacade = new OfferFacade($offersReader, $resource, $logger);
if('count_by_price_range' == $strategy) {
    echo "\nCount by price range [{$arg1}, {$arg2}]: ".$offerFacade->countByPriceRange($arg1, $arg2)."\n\n";
} elseif('count_by_vendor_id' == $strategy) {
    echo"\nCount by vendor id [{$arg1}]: ".$offerFacade->countByVendor($arg1)."\n\n";
} else {
    $logger->error("Invalid strategy name '{$strategy}'");
}