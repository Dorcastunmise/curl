<?php

    $curl = curl_init();

    $srch_str = "movies";
    $url = "https://www.amazon.com/s?k=". $srch_str . "&ref=nb_sb_noss_1";
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "", // <-- allow all encodings (gzip, deflate, br)
        CURLOPT_USERAGENT => "Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36 Edg/140.0.0.0",
    ]);
 
    #https://m.media-amazon.com/images/I/617NAeDADpL._AC_UY218_.jpg

    $response = curl_exec($curl);

    #$matches = array();
    $response = str_replace('src="/', 'src="https://www.amazon.com/', $response);    
    #print_r($matches);
    if(curl_errno($curl)) {
        echo 'Error:' . curl_error($curl);
        exit();
    } else {
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        echo "status = ". $status . "\n";
        echo $response;
    }
    
    
    curl_close($curl);