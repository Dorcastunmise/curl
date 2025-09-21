<?php
    #SERPs => Search Engine Results Pages.
    $srch_str = "about";
    $url = "https://syssoftcons.net/$srch_str";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER =>true,
        CURLOPT_HEADER =>true,       
        CURLOPT_FOLLOWLOCATION =>true,
        CURLOPT_VERBOSE =>true,
        CURLOPT_SSL_VERIFYPEER =>false,
        CURLOPT_SSL_VERIFYHOST =>false,
        CURLOPT_USERAGENT =>"Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36 Edg/140.0.0.0",
        CURLOPT_ENCODING =>"", // <-- allow all encodings (gzip, deflate, br),
        CURLOPT_HTTPHEADER => array(
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
            "Accept-Language: en-US,en;q=0.9",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Upgrade-Insecure-Requests: 1",
        ),
    ));

    $response = curl_exec($curl);

    if(curl_errno($curl)) {
        echo "error: " . curl_error($curl);
    } else {
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        #echo "status = ". $status . "\n";
        echo $response;
    }

    curl_close($curl);