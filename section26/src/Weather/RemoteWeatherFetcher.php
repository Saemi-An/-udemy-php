<?php
declare(strict_types=1);

namespace App\Weather;

class RemoteWeatherFetcher implements WeatherFetcherInterface {

    public function fetch(string $paramCity): ?WeatherInfo {

        $fp = @fsockopen("ssl://downloads.codingcoursestv.eu", 443, $errno, $errstr, 30);

        if (!$fp) {
            // [예외 처리] remote server에 문제가 있는 경우
            return null;
            echo "$errstr ($errno)<br />\n";

        } else {
            $out = "GET /056%20-%20php/weather/weather.php?" . http_build_query(['city' => $paramCity]) . " HTTP/1.1\r\n";
            $out .= "Host: downloads.codingcoursestv.eu\r\n";
            $out .= "Connection: Close\r\n\r\n";
            fwrite($fp, $out);
            
            $resp = [];
            while (!feof($fp)) {
                $resp[] = fgets($fp, 128);
            }
            fclose($fp);
        
            // 변환
            // 타겟이 여러 세그먼트에 걸쳐 응답이 올 것을 대비하여 
            // 하나의 string으로 implode()한 뒤, \r\n을 기준으로 explode 하여, 인덱스로 정확한 타겟을 json_decode()
            $respStr = implode($resp);
            $splittedResp = explode("\r\n", $respStr);
            
            if ( !str_contains($splittedResp[0], 'Not Found') ) {
                $data = json_decode($splittedResp[10], true);
                
                // Weather obj로 변환
                return new WeatherInfo($data['city'], $data['temperature'], $data['weather']);
            }
            // [예외 처리] remote server의 응답이 유효하지 않을 경우
            else {
                return null;
            }
            
        }
    }
}