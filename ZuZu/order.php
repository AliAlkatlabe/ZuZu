<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZuZu bestelling</title>
    <?php require_once('lib/database.php'); 
    session_start();
    ?>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<div class="confirm-page">
        <h1>Overzicht : Bestelling</h1>
        <h3>Klant gegevens</h3>
        <div class="client-info">
        <table>
  <tr>
    <td>Voornaam:</td>
    <td><?=  $_SESSION["fname"] ?></td>
    
  </tr>
  <tr>
    <td>Achternaam</td>
    <td><?=  $_SESSION["lname"] ?></td>
    
  </tr>
  <tr>
    <td>Adres</td>
    <td><?=  $_SESSION["address"] ?></td>
    
  </tr>
  <tr>
    <td>Postcode</td>
    <td><?= $_SESSION["zipcode"] ?></td>
    
  </tr>
  <tr>
    <td>Woonplaats</td>
    <td><?= $_SESSION["city"] ?></td>
    
  </tr>
  
</table>
            
        </div>
        <hr>
        <h3>Bestelling gegevens</h3>
        <div class="order-info" style="color: darkblue; font-weight:bold ">
            Sushi: <?= $_SESSION["order"] ?> <br>
            Aantal: <?= $_SESSION["amount"] ?>
            <!-- id: <?php //$_POST['id'] ?> -->
            </p>
            <form action="order.php" method="post">
                <button type="submit" name="submit">OK</button>
            </form>

        </div>
    </div>
</body>
<?php
if (isset($_POST['submit'])) {
    session_destroy();
    header("location:index.php");
}
?>
</html>


