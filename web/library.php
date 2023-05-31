<?php
$unauthenticatedContents = array('login-signup');
$unauthenticatedScripts = array('userRecord.php', 'userlogin.php');
if (!isset($content) || $content == '' || strpos($content, '://') || !file_exists($content . '.php'))
{
    $content = 'login-signup';
}

extract($_REQUEST);

session_start();

verify_authentication();


function get_content()
{
    global $content;

    if (!isset($content))
    {
        $content = 'home';
    }

    $content = strtolower($content);

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
function verify_authentication()
{
    global $content, $unauthenticatedContents, $unauthenticatedScripts;

    $scriptName = substr($_SERVER['PHP_SELF'], strlen(get_script_root()));

    if (!(($scriptName == 'index.php' && in_array($content, $unauthenticatedContents)) ||
          in_array($scriptName, $unauthenticatedScripts)))
    {
        if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated'])
        {
            session_unset();
            session_destroy();
            session_write_close();

            // echo('invaild');

            // echo($scriptName);

            // echo($content);
            header('Location: index.php');
            
            exit();
        }
    }
}
function get_script_root()
{
    return '/web/';
}