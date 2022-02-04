<?php

use Metro\Contract\ILogger;
use Metro\Contract\IResource;
use Metro\Facade\OfferFacade;
use Metro\Reader\OffersReader;
use PHPUnit\Framework\TestCase;

class OffersFacadeTest extends TestCase
{
    public function test_CountByPriceFilter_WhenGivingAValidPriceRange_ThenItShouldReturnGreaterThanZeroValue()
    {
        $offerFacade = $this->getOfferFacade();
        $this->assertEquals(1, $offerFacade->countByPriceRange(12.00, 145.80));
    }

    public function test_CountByVendorFilter_WhenGivingAValidPriceRange_ThenItShouldReturnGreaterThanZeroValue()
    {
        $offerFacade = $this->getOfferFacade();
        $this->assertEquals(2, $offerFacade->countByVendor(35));
    }

    protected function getOfferFacade():OfferFacade
    {
        $logger = $this->getMockBuilder(ILogger::class)
            ->getMock();
        $resource = $this->getMockBuilder(IResource::class)
            ->getMock();
        $resource->method('read')
            ->willReturn(file_get_contents(__DIR__.'/../../dummy/offers.json'));
        $offersReader = new OffersReader();
        return new OfferFacade($offersReader, $resource, $logger);
    }
}