<?php

    $post_data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
    ];

    $curl = curl_init("https://jsonplaceholder.typicode.com/posts");

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($post_data),
    ]);

    $response = curl_exec($curl);

    if(curl_errno($curl)) {
        echo 'Error:' . curl_error($curl);
        exit();
    } else {
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        echo "status = ". $status . "\n";
        echo $response;
    }

    curl_close($curl);