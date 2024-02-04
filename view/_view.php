<?php

if (str_contains($_SERVER['REQUEST_URI'], 'view/')) {
    $url = $_SERVER['REQUEST_URI'];

    $url = str_replace('view/', '', $url);
    $url = str_replace('.view', '', $url);

    header('Location: ' . $url);
}
