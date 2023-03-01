<?php

/*
 * Proxy connection to the orderForm database
 */

function orderFormConnect()
{
    $server = 'localhost:3308';
    $dbname = 'orderform';
    $username = 'formClient';
    $password = 'FJB9AQPZERIH.l0N';
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Create the actual connection object and assign it to a variable
    try {
        $link = new PDO($dsn, $username, $password, $options);
        return $link;
    } catch (PDOException $e) {
        header('Location: /orderForm/view/500.php');
        exit;
    }
}
