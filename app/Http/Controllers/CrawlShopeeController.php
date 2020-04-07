<?php

namespace App\Http\Controllers;

use Spatie\Browsershot\Browsershot;
use Spatie\Crawler\Crawler;
use App\Observers\PageCrawlObserver;
use App\Helpers\Spintax;


class CrawlShopeeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getData()
    {
        $url = "https://shopee.vn";
        Crawler::create()
            ->setCrawlObserver(new PageCrawlObserver())
            ->executeJavaScript()
            ->setBrowsershot((new Browsershot())->waitUntilNetworkIdle())
            ->startCrawling($url);
    }

    public function repalceSpin()
    {
        $words = array();
        //string cần thay đổi
        $string = "Anh chị em đây là đài tiếng tìm
                kiếm nói việt nam ban kiếm tìm Rất khó để có thể tìm ra giải pháp đủ tốt, làm hài lòng 20 đại diện
                của giải Ngoại hạng Anh. Bởi, phương án nào cũng động chạm đến quyền lợi của các đội bóng theo hướng
                tích cực và tiêu cực khác nhau. Nếu cuộc họp ngày 19/3 không đạt được kết quả cụ thể, trong trường hợp bất khả kháng FA phải tổ chức bỏ phiếu. Đây là điều nhà
                vô địch dự kiến Liverpool không hề mong muốn, bởi có quá nhiều rủi ro kiếm tìm";
        $matches = array();
        $matchFound = preg_match_all(
            "/(" . "kiếm tìm|tìm kiếm|Anh chị|Anh chị em|Cả nhà|Các bạn|ả đào|cô đầu|đào nương|nhà trò" . ")/i",
            $string,
            $matches
        );

        //get ra cụm từ cần thay đổi
        if ($matchFound):
            $words = array_unique($matches[0]);
        endif;

        //Cụm từ thay thế
        $string_replace = ['kiếm tìm|tìm kiếm', 'Anh chị|Anh chị em|Cả nhà|Các bạn', 'a dua|a tòng|hùa|vào hùa'];
        foreach ($string_replace as $key => $vl) {
            foreach ($words as $k => $i) {
                $matches = array();
                $matchFounds = preg_match_all("/(" . $i . ")/i", $vl, $matches);
                if ($matchFounds) {
                    $string = preg_replace('/' . ' ' . $i . '/', " {" . $vl . "} ", $string);
                    $string = preg_replace('/' . ' ' . $i . ' ' . '/', " {" . $vl . "} ", $string);
                    $string = preg_replace('/' . $i . ' ' . '/', " {" . $vl . "} ", $string);
                }

            }
        }
        print_r($string);
        return $string;
    }

    public function spinTool($string)
    {
        $spintax = new Spintax();
        $result = $spintax->process($string);
        return $result;
    }


}
