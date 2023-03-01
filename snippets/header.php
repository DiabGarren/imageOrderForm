<img src="/orderForm/images/site/logo.png" alt="orderForm Logo">
<div>
    <?php
    if (isset($_SESSION['clientData'])) {
        echo "<a href='/orderForm/accounts/'>Welcome " . $_SESSION['clientData']['clientFirstName'] . "</a>" . 
        "<a href='/orderForm/accounts/?action=logout'>Log out</a>";
        
    } else {
        echo "<a href='/orderForm/accounts/?action=login-view' id='my-account'>My Account</a>";
    }
    // else if (isset($cookieFirstname)) {
    //     echo "<p>Welcome $cookieFirstname</p>";
    // }
    ?>
</div>