<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 15.07.2020
 * Time: 13:06
 */

namespace TKGM\Adres;

class HttpClient extends Curl
{
    public static function init()
    {
        return new HttpClient();
    }

    protected static function createUrl(AddressProperties $properties)
    {
        $url = "http://uygulamalar.tkgm.gov.tr/TKGMMudurlukler/?ilFiltre=" . $properties->getCity() . "&ilceFiltre=" . $properties->getDistrict() . "&mahalleFiltre=" . $properties->getNeighborhood() . "&birimFiltre=" . $properties->getUnit() . "&page=" . $properties->getPage();

        return $url;
    }



}