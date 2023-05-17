<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;

class NewsSpider extends BasicSpider
{
    public array $startUrls = [
        'https://www.filgoal.com/articles',
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
        $news = [];
        $i = 0;

        $response
            ->filter('#list-box ul li')->each(function ($node) use(&$news, &$i){
                // link
                $node->filter('a')->each(function($node) use(&$news, &$i){
                    if(!empty($node->attr('href'))) {
                        $news[$i]['link'] = "https://www.filgoal.com" . $node->attr('href');
                    }
                });

                // img
                $node->filter('a img')->each(function($node) use(&$news, &$i){
                    if(!empty($node->attr('data-src'))) {
                        $news[$i]['img'] = "https:" . $node->attr('data-src');
                    }
                });

                // Title
                $node->filter('div h6')->each(function($node) use(&$news, &$i){
                    $news[$i]['title'] = $node->text();
                });

                // Description
                $node->filter('div p')->each(function($node) use(&$news, &$i){
                    $news[$i]['description'] = $node->text();
                });

                // Date
                $node->filter('div span')->each(function($node) use(&$news, &$i){
                    $news[$i]['date'] = $node->text();
                });

                $i++;
            });

        yield $this->item([
            'news' => $news,
        ]);
    }
}
