<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlInternalUrls;
use App\Observer\PageCrawlObserver;

class GetDataCategoryController extends Controller
{
    const TIME_OUT = 300;

    public function getData()
    {
        set_time_limit(self::TIME_OUT);
        Log::debug('Start crawl category link, seller = ');

        $awsBaseUrl = env('BASE_SHOPEE_URL');

        $html = Crawler::create()
            ->setCrawlObserver(new PageCrawlObserver())
            ->setCrawlProfile(new CrawlInternalUrls($awsBaseUrl))
            ->executeJavaScript()
            ->setBrowsershot((new Browsershot())->waitUntilNetworkIdle())
            ->setBrowsershot((new Browsershot())->setDelay(1500))
            ->startCrawling($awsBaseUrl);
    }
}
