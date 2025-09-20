<?php

    /*
        https://regex101.com/
        <h3 class="resultTitle" id="verily_adv">(?s)(.*?)<\/h3>

        <h3 class="resultTitle" id="verily_adv"><span class="hw"><span class="hw">verily, </span
        <span class="ps">adv. & adj.</span></span></h3>
    */

    $word = "secure";
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://www.oed.com/search/dictionary/?scope=Entries&q=hello");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // return the response as a string
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // follow redirects
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // disable SSL peer (certificate) verification
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // disable SSL host verification


    // Pretend to be Chrome
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
    ]);

    $response = curl_exec($curl);

    if (curl_errno($curl)) { // check for errors
        echo "cURL error: " . curl_error($curl); 
    } else {
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE); // get HTTP status code
        $response = str_replace('src="/', 'src="https://www.oed.com/', $response); // fix relative URLs for images
        $response = str_replace('src="images/', 'src="https://www.oed.com/images/', $response);
        $response = str_replace('href="/', 'href="https://www.oed.com/', $response); // fix relative URLs for links
        $response = str_replace('action="/', 'action="https://www.oed.com/', $response); // fix relative URLs for forms
        echo $response; // preview first part of response
    }

    curl_close($curl);
