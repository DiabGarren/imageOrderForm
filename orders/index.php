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

if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {
    case 'new-order':
        break;
        
    case 'update-order':
        break;
    
    case 'view-orders':
        echo json_encode(getOrders());
        break;

    default:
        include '../view/order-managemet.php';
        break;
}
