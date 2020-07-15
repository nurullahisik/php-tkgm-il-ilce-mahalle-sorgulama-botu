<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 15.07.2020
 * Time: 13:06
 */

namespace TKGM\Adres;

class AddressInitialize extends HttpClient
{
    public function create(AddressProperties $properties)
    {
        $html_parser = new HTMLParser();


        $page_count = 2;
        for ($i = 1; $i < $page_count; $i++){
            $properties->setPage($i);
            $result = parent::init()->get(parent::createUrl($properties), []);

            $html_parser->parse($result['body']);

            if ($i == 1 && $html_parser->page_count > 1){
                $page_count = (int)$html_parser->page_count + 1;
            }
        }

        return [
            "status"  => true,
            "data"    => $html_parser->data,
            "message" => ""
        ];
    }
}