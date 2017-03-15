<?php
/**
 * Created by PhpStorm.
 * User: xulu
 * Date: 2016/5/11
 * Time: 20:56
 */
$dbhost = '127.0.0.1';
$dbname = 'library_db';
$dbuser = 'root';
$dbpass = '960805';
$appname = "复旦大学图书管理系统";

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) die($connection->connect_error);
queryMysql("set names 'utf8'");
function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
}

function destroySession()
{
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}



?>