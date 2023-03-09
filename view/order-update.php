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
    <title>Update Order | Order Form</title>
</head>

<body>
    <header>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/header.php' ?>
    </header>
    <nav>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/navigation.php' ?>
    </nav>
    <main>
        <h1>Update Order</h1>
        <form method="post" action="/orderForm/orders/">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>

            <label for="orderFirstname">First Name</label>
            <input type="text" name="orderFirstname" id="orderFirstname" required <?php
                                                                                    echo 'value="' . $order['orderFirstname'] . '"';
                                                                                    ?>>
            <label for="orderLastname">Last Name</label>
            <input type="text" name="orderLastname" id="orderLastname" required <?php
                                                                                echo 'value="' . $order['orderLastname'] . '"';
                                                                                ?>>
            <label for="orderPhone">Phone number</label>
            <input type="text" name="orderPhone" id="orderPhone" required <?php
                                                                            echo 'value="' . $order['orderPhone'] . '"';
                                                                            ?>>
            <?php
            $print = '';
            foreach (explode(', ', $order['orderPrint']) as $printImages) {
                $print .= "$printImages\n";
            }
            ?>
            <?php
            $digital = '';
            foreach (explode(', ', $order['orderDigital']) as $digitalImages) {
                $digital .= "$digitalImages\n";
            }
            ?>
            <label for="orderPrint">Images to Print</label>
            <textarea name="orderPrint" id="orderPrint" ><?php
                                                                    echo $print;
                                                                    ?></textarea>
            <label for="orderDigital">Digital only Images</label>
            <textarea name="orderDigital" id="orderDigital"><?php
                                                                        echo $digital;
                                                                        ?></textarea>
            <label for="orderAmount">Amount Due</label>
            <input type="text" name="orderAmount" id="orderAmount" required readonly <?php
                                                                                        echo 'value="' . $order['orderAmount'] . '"';
                                                                                        ?>>

            <input type="submit" name="submit" class="form-button" id="update-order" value="Update Order">

            <input type="hidden" name="action" value="update-order">
            <input type="hidden" name="orderId" value="
            <?php
            echo $orderId;
            ?>
            ">
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/footer.php' ?>
    </footer>
</body>

</html>