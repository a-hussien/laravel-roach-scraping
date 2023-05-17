<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;

class YallaKoraSpider extends BasicSpider
{
    public array $startUrls = [
        'https://www.yallakora.com/newslisting/',
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
        $latestNews = [];
        $i = 0;

        $response
            ->filter('#ulListing li')->each(function ($node) use(&$latestNews, &$i){
                // link
                $node->filter('div a')->each(function($node) use(&$latestNews, &$i){
                    if(!empty($node->attr('href'))) {
                        $latestNews[$i]['link'] = "https://www.yallakora.com" . $node->attr('href');
                    }
                });

                // img
                $node->filter('div a img')->each(function($node) use(&$latestNews, &$i){
                    if(!empty($node->attr('data-src'))) {
                        $latestNews[$i]['img'] = $node->attr('data-src');
                    }
                });

                // cat
                $node->filter('div div.desc a.secName')->each(function($node) use(&$latestNews, &$i){
                    $latestNews[$i]['cat'] = $node->text();
                });

                // Title
                $node->filter('div a p')->each(function($node) use(&$latestNews, &$i){
                    $latestNews[$i]['title'] = $node->text();
                });

                // Date
                $node->filter('div div .time')->each(function($node) use(&$latestNews, &$i){
                    $latestNews[$i]['date'] = $node->children()->first()->text();
                });

                // Time
                $node->filter('div div .time span')->each(function($node) use(&$latestNews, &$i){
                    $latestNews[$i]['time'] = $node->text();
                });

                $i++;
            });

        yield $this->item([
            'news' => $latestNews,
        ]);
    }
}
