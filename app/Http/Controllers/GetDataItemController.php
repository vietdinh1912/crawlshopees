<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Spatie\Browsershot\Browsershot;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlInternalUrls;
use App\Observers\PageItemCrawlObserver;

class GetDataItemController extends Controller
{
    const TIME_OUT = 300;

    public function getData()
    {
        $result = DB::table('category_shop')->selectRaw('link,name')->get();
//        dd($result);
        foreach ($result as $item) {
            $awsBaseUrl = env('BASE_SHOPEE_URL') . $item->link;
            $html = Crawler::create()
                ->setCrawlObserver(new PageItemCrawlObserver())
                ->setCrawlProfile(new CrawlInternalUrls($awsBaseUrl))
                ->executeJavaScript()
                ->setBrowsershot((new Browsershot())->waitUntilNetworkIdle())
                ->setBrowsershot((new Browsershot())->setDelay(1500))
                ->startCrawling($awsBaseUrl);
            dd('ok');
        }
    }
}
