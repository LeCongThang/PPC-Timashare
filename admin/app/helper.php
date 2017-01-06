<?php
function post($key, $default = null)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }

    return $default;
}

function get($key, $default = null)
{
    if (isset($_GET[$key])) {
        return $_GET[$key];
    }

    return $default;
}

function redirect($url, $code = 301)
{
    header('Location: ' . $url, true, $code);
    die();
}