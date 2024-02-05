<?php

//check if the url contains 'view/'
if (str_contains($_SERVER['REQUEST_URI'], 'view/')) {
    $url = $_SERVER['REQUEST_URI'];

    $url = str_replace('view/', '', $url);
    $url = str_replace('.view', '', $url);

    //redirect to the new url (without 'view/' and '.view' in the url)
    header('Location: ' . $url);
}
