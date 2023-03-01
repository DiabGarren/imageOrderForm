<?php
if (!$_SESSION['loggedin']) {
    header('Location: /phpmotors/');
}
$welcome = "Welcome " . $_SESSION['clientData']['clientFirstName'] . " " . $_SESSION['clientData']['clientLastName'];
$dataList = "<ul>
        <li>First name: " . $_SESSION['clientData']['clientFirstName'] . "</li>
        <li>Last name: " . $_SESSION['clientData']['clientLastName'] . "</li>
        <li>Email: " . $_SESSION['clientData']['clientEmail'] . "</li>
        <li>Level: " . $_SESSION['clientData']['clientLevel'] . "</li>
        </ul>";
$vehicleLink = '';
if ($_SESSION['clientData']['clientLevel'] > 1) {
    $vehicleLink = "<p id='vehicle-paragraph'>The following link will take you to the vehicle management page. This page will allow you add a new vehicle classification or even add an additional vehicle to the database.<br>
    <a href='/phpmotors/vehicles/' id='vehicle-link'>Vehicle Management</a></p>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/main.css">
    <style media="screen"></style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <title>PHP Motors</title>
</head>

<body>
    <header>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php' ?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>
    <main id="admin-view">
        <h1><?php echo $welcome; ?></h1>
        <?php echo $dataList . $vehicleLink; ?>
    </main>
    <footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
    </footer>
</body>

</html>