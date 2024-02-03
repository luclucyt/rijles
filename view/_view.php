<?php

//if the url contains a view/ then we know we are in the view folder
if (str_contains($_SERVER['REQUEST_URI'], 'view/')) {
    $url = $_SERVER['REQUEST_URI'];

    $url = str_replace('view/', '', $url);
    $url = str_replace('.view', '', $url);

    header('Location: ' . $url);
}
