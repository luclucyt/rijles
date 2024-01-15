<?php

// if the sessions isnt started, start it 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo '<script>';
require $_SERVER['DOCUMENT_ROOT'] . '/JS/root.js';
echo '</script>';
