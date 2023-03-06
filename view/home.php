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
    <title>Order Form</title>
</head>

<body>
    <header>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/header.php' ?>
    </header>
    <nav>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/navigation.php' ?>
    </nav>
    <main class="grid">
        <h1>Welcome to the Image Order Form!</h1>

        <table id="ordersDisplay">
            <?php echo $orders; ?>
        </table>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/orderForm/snippets/footer.php' ?>
    </footer>
</body>

</html>