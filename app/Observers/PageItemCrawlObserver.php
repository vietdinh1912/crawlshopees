<?php

namespace App\Observers;

use DOMDocument;
use DOMXPath;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObserver;

class PageItemCrawlObserver extends CrawlObserver
{
    private $pages = [];

    public function willCrawl(UriInterface $uri)
    {
        echo "Now crawling: " . (string)$uri . PHP_EOL;
    }

    /**
     * Called when the crawler has crawled the given url successfully.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null)
    {
        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = false;
        @$doc->loadHTML($response->getBody());
        $arr_cate = [];
        $xpath = new DOMXPath($doc);
//        $tags = $xpath->query('//div [@class="col-xs-2-4 shopee-search-item-result__item"] //a');
        $tags = $xpath->query('//div [@class="_3ZDC1p _1tDEiO"] //img');
        foreach ($tags as $tag) {
            $arr_cate[] = ['link' => $tag->getAttribute("src")];
        }
        dd($arr_cate);
//        dump($arr_cate);
//        DB::table('category_shop')->insert($arr_cate);
        exit;
    }

    /**
     * Called when the crawler had a problem crawling the given url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null)
    {
        echo 'failed';
    }

    public function finishedCrawling()
    {
        echo 'crawled ' . count($this->pages) . ' urls' . PHP_EOL;
        foreach ($this->pages as $page) {
            echo sprintf("Url  path: %s Page title: %s%s", $page['path'], $page['title'], PHP_EOL);
        }
    }
}
