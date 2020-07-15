<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 15.07.2020
 * Time: 13:06
 */

namespace TKGM\Adres;
class Curl
{
    public function get($url, $header)
    {
        $data = array(
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        );

        return $this->exec($url, $data, true);
    }

    public function post($url, $header, $content)
    {
        $data = array(
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($content),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        );

        return $this->exec($url, $data);
    }

    private function exec($url, $options, $curl_header = false)
    {
        $this->certificate($options);

        $ch = curl_init($url);

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $info     = curl_getinfo($ch);
        $error    = curl_error($ch);

        curl_close($ch);

        return [
            'status' => empty($response) ? false : true,
            'body'   => $response,
            'error'  => $error,
            'info'   => $info
        ];
    }

    private function certificate(& $options)
    {
        $options[CURLOPT_SSL_VERIFYPEER] = false;
        $options[CURLOPT_SSL_VERIFYHOST] = false;

        return $options;
    }
}
