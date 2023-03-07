<?php

/*
 * Orders Model 
 */

function getOrderById($orderId)
{
    $db = orderFormConnect();
    $sql = 'SELECT * FROM orders WHERE orderId = :orderId';
    $stmt = $db->prepare($sql);
    $stmt->bindvalue(':orderId', $orderId, PDO::PARAM_STR);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $order;
}

function newOrder($orderFirstname, $orderLastname, $orderPhone, $orderPrint, $orderDigital, $orderAmount)
{
    $db = orderFormConnect();
    $sql = 'INSERT INTO orders (orderFirstname, orderLastname, orderPhone, orderPrint, orderDigital, orderAmount)
    VALUES (:orderFirstname, :orderLastname, :orderPhone, :orderPrint, :orderDigital, :orderAmount)';
    $stmt = $db->prepare($sql);
    $stmt->bindvalue(':orderFirstname', $orderFirstname, PDO::PARAM_STR);
    $stmt->bindvalue(':orderLastname', $orderLastname, PDO::PARAM_STR);
    $stmt->bindvalue(':orderPhone', $orderPhone, PDO::PARAM_STR);
    $stmt->bindvalue(':orderPrint', $orderPrint, PDO::PARAM_STR);
    $stmt->bindvalue(':orderDigital', $orderDigital, PDO::PARAM_STR);
    $stmt->bindvalue(':orderAmount', $orderAmount, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function formatImages($orderImages)
{
    $order = "";
    for ($i = 0; $i < count(explode("\n", $orderImages))-1; $i++){
        $order .= substr(explode("\n", $orderImages)[$i], 0, strlen(explode("\n", $orderImages)[$i])-1).", ";
    }

    $order .= explode("\n", $orderImages)[count(explode("\n", $orderImages))-1];
    return $order;
}

function updateOrder($orderId, $orderFirstname, $orderLastname, $orderPhone, $orderPrint, $orderDigital, $orderAmount)
{
    $db = orderFormConnect();
    $sql = 'UPDATE orders SET orderFirstname = :orderFirstname, orderLastname = :orderLastname,
    orderPhone = :orderPhone, orderPrint = :orderPrint, orderDigital = :orderDigital, orderAmount = :orderAmount
    WHERE orderId = :orderId';
    $stmt = $db->prepare($sql);
    $stmt->bindvalue(':orderFirstname', $orderFirstname, PDO::PARAM_STR);
    $stmt->bindvalue(':orderLastname', $orderLastname, PDO::PARAM_STR);
    $stmt->bindvalue(':orderPhone', $orderPhone, PDO::PARAM_STR);
    $stmt->bindvalue(':orderPrint', $orderPrint, PDO::PARAM_STR);
    $stmt->bindvalue(':orderDigital', $orderDigital, PDO::PARAM_STR);
    $stmt->bindvalue(':orderAmount', $orderAmount, PDO::PARAM_STR);
    $stmt->bindvalue(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function deleteOrder($orderId)
{
    $db = orderFormConnect();
    $sql = 'DELETE FROM orders WHERE orderId = :orderId';
    $stmt = $db->prepare($sql);
    $stmt->bindvalue(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}