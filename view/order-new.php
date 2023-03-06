<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/orderForm/css/main.css">
    <style media="screen"></style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <title>New Order | Order Form</title>
</head>

<body>
    <header>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/header.php' ?>
    </header>
    <nav>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/navigation.php' ?>
    </nav>
    <main>
        <h1>New Order</h1>
        <form method="post" action="/orderForm/orders/">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>

            <label for="orderFirstname">First Name</label>
            <input type="text" name="orderFirstname" id="orderFirstname" required>

            <label for="orderLastname">Last Name</label>
            <input type="text" name="orderLastname" id="orderLastname" required>

            <label for="orderPhone">Phone number</label>
            <input type="number" name="orderPhone" id="orderPhone" pattern="([0-9])" required>

            <label for="orderPrint">Images to Print</label>
            <textarea name="orderPrint" id="orderPrint" required></textarea>

            <label for="orderDigital">Digital only Images</label>
            <textarea name="orderDigital" id="orderDigital" required></textarea>

            <label for="orderAmount">Amount Due</label>
            <input type="text" name="orderAmount" id="orderAmount" required readonly value="0">

            <label for="orderPaid">Amount Paid</label>
            <input type="text" name="orderPaid" id="orderPaid" required value="0">

            <label for="orderChange">Change</label>
            <input type="text" name="orderChange" id="orderChange" required readonly value="0">

            <input type="submit" name="submit" class="form-button" id="new-order" value="New Order">

            <input type="hidden" name="action" value="new-order">
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/footer.php' ?>
    </footer>
    <script src="/orderForm/js/new-order.js"></script>
</body>

</html>