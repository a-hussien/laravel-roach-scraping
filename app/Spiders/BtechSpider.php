<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;

class BtechSpider extends BasicSpider
{
    public array $startUrls = [
        'https://btech.com/en/moblies/mobile-phones-smartphones/smartphones.html',
    ];

    public array $downloaderMiddleware = [
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        //
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    /**
     * @return Generator<ParseResult>
     */
    public function parse(Response $response): Generator
    {
        $products = [];
        $i = 0;

        $response
            ->filter('#html-body .products div')->each(function ($node) use(&$products, &$i){

                // link
                $node->filter('a')->each(function($node) use(&$products, &$i){
                    if(!empty($node->attr('href'))) {
                        $products[$i]['link'] = $node->attr('href');
                    }
                });

                // Title
                $node->filter('a .plpContentWrapper .listviewLeft h2')->each(function($node) use(&$products, &$i){
                    $products[$i]['title'] = $node->text();
                });

                // img
                $node->filter('a .plpThumbImg .product-image-photo')->each(function($node) use(&$products, &$i){
                    if(!empty($node->attr('data-src'))) {
                        $products[$i]['img'] = $node->attr('data-src');
                    }
                });

                // price
                $node->filter('a .plpContentWrapper .listviewRight .plp-price-wrapper div  div p > .price-container > .price-wrapper')->each(function($node) use(&$products, &$i){
                    if(!empty($node->attr('data-price-amount'))) {
                        $products[$i]['price'] = number_format($node->attr('data-price-amount')) . " EGP";
                    }
                });

                $i++;
            });

        yield $this->item([
            'products' => $products,
        ]);
    }
}
