<?php

/*
 * File for all custom functions
 */

function checkEmail($clientEmail)
{
    $validEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $validEmail;
}

function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

function checkClassification($classificationName, $classifications)
{
    foreach ($classifications as $classification) {
        if ($classificationName == $classification[0]) {
            return 0;
        }
    }

    if (strlen($classificationName) > 30) {
        return 0;
    }
    return $classificationName;
}

function buildNav($classifications)
{
    $navList = '<ul>';
    $navList .= "<li><a href='/orderForm/' title='View the PHP Motors home page'>Home</a></li>";
    $navList .= '<li id="vehicle-list"><a href="#" title="View our list of vehicles">Vehicles</a><ul>';
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/orderForm/?action=" . urlencode($classification['classificationName']) . "
            ' title='View our $classification[classificationName] product line'>$classification[classificationName]</a>
            </li>";
    }
    $navList .= '</ul></li></ul>';

    return $navList;
}

function displayOrderList($orders)
{
    $orderTable = '<thead>
    <tr>
    <th>Name</th>
    <th>Print Images</th>
    <th>Digital Images</th>
    <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>';
    foreach ($orders as $order) {
        $orderTable .= "<td>" . $order['orderFirstname'] . " " . $order['orderLastname'] . "</td>";

        $orderTable .= "<td>" . $order['orderPrint'] . "</td>";
        $orderTable .= "<td>" . $order['orderDigital'] . "</td>";
        $orderTable .= "<td>" . $order['orderAmount'] . "</td></tr>";
    }
    $orderTable .= '</tbody>';
    return $orderTable;
}

function displayOrderManager($orders)
{
    $orderTable = '<thead>
    <tr>
    <th>Name</th>
    <th>Print Images</th>
    <th>Digital Images</th>
    <th>Total</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <tr>';
    foreach ($orders as $order) {
        $orderTable .= "<td>" . $order['orderFirstname'] . " " . $order['orderLastname'] . "</td>
        <td>" . $order['orderPrint'] . "</td>
        <td>" . $order['orderDigital'] . "</td>
        <td>" . $order['orderAmount'] . "</td>
        <td><a href='/orderForm/orders/?action=mod&orderId=" . $order['orderId'] . "' title='Click to modify'>Modify</a></td>
        <td><a href='/orderForm/orders/?action=del&orderId=" . $order['orderId'] . "' title='Click to delete'>Delete</a></td></tr>";
    }
    $orderTable .= '</tbody>';
    return $orderTable;
}
