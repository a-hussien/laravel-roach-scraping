<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;

class BooksSpider extends BasicSpider
{
    public array $startUrls = [
        'http://books.toscrape.com/',
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
        $books = [];
        $i = 0;

        $response
            ->filter('div ol li article')->each(function ($node) use(&$books, &$i){

                // link
                $node->filter('div a')->each(function($node) use(&$books, &$i){
                    if(!empty($node->attr('href'))) {
                        $books[$i]['link'] = "https://books.toscrape.com/" . $node->attr('href');
                    }
                });

                // img
                $node->filter('div a img')->each(function($node) use(&$books, &$i){
                    if(!empty($node->attr('src'))) {
                        $books[$i]['img'] = "https://books.toscrape.com/" . $node->attr('src');
                    }
                });

                // Title
                $node->filter('h3 a')->each(function($node) use(&$books, &$i){
                    $books[$i]['title'] = $node->attr('title');
                });

                // price
                $node->filter('div.product_price p.price_color')->each(function($node) use(&$books, &$i){
                    $books[$i]['price'] = $node->text();
                });

                // availability
                $node->filter('div.product_price p.availability')->each(function($node) use(&$books, &$i){
                    $books[$i]['availability'] = $node->text();
                });

                $i++;
            });

        yield $this->item([
            'books' => $books,
        ]);
    }
}
