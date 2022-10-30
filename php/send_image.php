<?php

if (isset($_GET['number']) && isset($_GET['caption']) && isset($_GET['file'])) {


    $number = $_GET['number'];
    $caption = $_GET['caption'];
    $file = $_GET['file'];
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
    curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/send-media');
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('number' => $number, 'file' => $file, 'caption' => $caption));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //needed so that the $result=curl_exec() output is the file and isn't just true/false
    // CURL COMMAND


    // curl_setopt($ch, CURLOPT_URL, "curl --location --request POST 'http://localhost:8000/send-message' \
    // --header 'Content-Type: application/x-www-form-urlencoded' \
    // --data-urlencode 'number=083832204284' \
    // --data-urlencode 'message=tes api'");

    if (curl_exec($ch)) {
        echo 'Success WhatsApp Send !';
    } else {
        echo 'Failed WhatsApp Send !';
    }
} else {
    echo 'not parameters';
}
