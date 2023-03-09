<?php

/* 
 * Orders Controller
 */


// Create or access a Session
session_start();

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/orders-model.php';
require_once '../library/functions.php';

$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL) {
    $action = trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}

switch ($action) {
    case 'new':
        include '../view/order-new.php';
        break;

    case 'new-order':
        $orderFirstname = trim(filter_input(INPUT_POST, 'orderFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderLastname = trim(filter_input(INPUT_POST, 'orderLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderPhone = trim(filter_input(INPUT_POST, 'orderPhone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderPrint = trim(filter_input(INPUT_POST, 'orderPrint', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderDigital = trim(filter_input(INPUT_POST, 'orderDigital', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderAmount = trim(filter_input(INPUT_POST, 'orderAmount', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderPaid = filter_input(INPUT_POST, 'orderChange', FILTER_SANITIZE_NUMBER_INT);
        $orderChange = filter_input(INPUT_POST, 'orderChange', FILTER_SANITIZE_NUMBER_INT);

        if (empty($orderFirstname) || empty($orderLastname) || empty($orderPhone) || empty($orderAmount)) {
            $message = "<p class='form-warning red'>Please fill out all the fields.</p>";
            include '../view/order-new.php';
            exit;
        }

        if ($orderChange < 0) {
            $message = "<p class='form-warning red'>Please pay the fill amount before completing the order.</p>";
            include '../view/order-new.php';
            exit;
        }

        $orderOutcome = newOrder($orderFirstname, $orderLastname, $orderPhone, $orderPrint, $orderDigital, $orderAmount);
        if ($orderOutcome) {
            $message = "<p class='form-warning green'>Order was added successfully.<p>";
            header('Location: /orderForm/orders/');
            exit;
        } else {
            $message = "<p class='form-warning red'>There was an issue with your order.</p>";
        }
        break;

    case 'mod':
        $orderId = filter_input(INPUT_GET, 'orderId', FILTER_SANITIZE_NUMBER_INT);
        $order = getOrderById($orderId);
        include '../view/order-update.php';
        break;

    case 'update-order':
        $orderId = filter_input(INPUT_POST, 'orderId', FILTER_SANITIZE_NUMBER_INT);
        $orderFirstname = trim(filter_input(INPUT_POST, 'orderFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderLastname = trim(filter_input(INPUT_POST, 'orderLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderPhone = trim(filter_input(INPUT_POST, 'orderPhone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderPrint = trim(filter_input(INPUT_POST, 'orderPrint', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderDigital = trim(filter_input(INPUT_POST, 'orderDigital', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $orderAmount = trim(filter_input(INPUT_POST, 'orderAmount', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $order = getOrderById($orderId);

        if (empty($orderFirstname) || empty($orderLastname) || empty($orderPhone) || empty($orderAmount)) {
            $message = "<p class='form-warning red'>Please fill out all the fields.</p>";
            include '../view/order-update.php';
            exit;
        }


        $orderOutcome = updateOrder($orderId, $orderFirstname, $orderLastname, $orderPhone, $orderPrint, $orderDigital, $orderAmount);

        if ($orderOutcome) {
            $message = "<p class='form-warning green'>Order was Updated successfully.<p>";
            header('Location: /orderForm/orders/');
            exit;
        } else {
            $message = "<p class='form-warning red'>There was an issue updating your order.</p>";
            include '../view/order-update.php';
            exit;
        }
        break;

    case 'del':
        $orderId = filter_input(INPUT_GET, 'orderId', FILTER_SANITIZE_NUMBER_INT);
        $order = getOrderById($orderId);
        include '../view/order-delete.php';
        break;

    case 'delete-order':
        $orderId = filter_input(INPUT_POST, 'orderId', FILTER_SANITIZE_NUMBER_INT);
        
        $order = getOrderById($orderId);

        $orderOutcome = deleteOrder($orderId);

        if ($orderOutcome) {
            $message = "<p class='form-warning green'>Order was Deleted successfully.<p>";
            header('Location: /orderForm/orders/');
            exit;
        } else {
            $message = "<p class='form-warning red'>There was an issue deleting your order.</p>";
            include '../view/order-delete.php';
            exit;
        }
        break;

    default:
        $orders = displayOrderManager(getOrders());
        include '../view/order-managemet.php';
        break;
}
