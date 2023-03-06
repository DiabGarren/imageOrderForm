<?php

/*
 * Main controller
 */

// Create or access a Session
session_start();

require_once 'library/connections.php';
require_once 'model/main-model.php';
require_once 'library/functions.php';

$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL) {
    $action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}

switch ($action) {
    default:
        $orders = displayOrderList(getOrders());
        include 'view/home.php';
        break;
}
