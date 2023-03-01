<?php

/*
 * Orders Model 
 */

function getOrders()
{
    $db = orderFormConnect();
    $sql = 'SELECT * FROM orders';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $orders;
}
