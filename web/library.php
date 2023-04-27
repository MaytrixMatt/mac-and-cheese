<?php

extract($_REQUEST);

function get_content()
{
    global $content;

    if (!isset($content))
    {
        $content = 'home';
    }

    $content = ucfirst(strtolower($content));

    return $content;
}
function get_database_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "mac_and_cheese";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
