<?php
function getRandomName(string $regularName):string {
    $info = pathinfo($regularName);
    try {
        $bytes = random_bytes(15);
    }
    catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes). '.' .$info['extension'];
}