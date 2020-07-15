<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 15.07.2020
 * Time: 13:06
 */

namespace TKGM\Adres;

use TKGM\Adres\exception\ServiceException;

class HTMLParser
{
    public $data = [];
    public $page_count = 1;

    public function parse($html)
    {
        try {
            $dom = new \DOMDocument;

            @$dom->loadHTML($html);
            $dom->preserveWhiteSpace = false;

            $path = new \DOMXPath($dom);

            $pages = $path->query('//table[@class="sayfa"]');

            if ($pages->length == 0) {
                return [];
            }

            $text = $pages->item(0)->textContent;

            $text = explode(" - ", $text);
            $text = explode(" ", $text[1]);

            $this->page_count = $text[0];

            $table = $path->query('//table[@class="sonuc"]');

            $rows = $table->item(0)->getElementsByTagName("tr");

            if ($rows->length == 0) {
                return [];
            }

            foreach ($rows AS $key => $item) {
                if ($key < 2)
                    continue;

                $columns = $item->getElementsByTagName("td");

                $this->data[] = [
                    "il"      => $this->replace($columns->item(0)->nodeValue),
                    "ilce"    => $this->replace($columns->item(1)->nodeValue),
                    "kurum"   => $this->replace($columns->item(2)->nodeValue),
                    "mahalle" => $this->replace($columns->item(3)->nodeValue),
                ];

            }
        }catch (ServiceException $ex){
            return [];
        }

    }

    private function replace($text = "")
    {
        return preg_replace('/\s\s+/', '', $text);
    }

}
