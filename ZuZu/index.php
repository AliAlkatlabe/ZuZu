<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/style.css">
  <title>ZuZu Sushi</title>
  <?php require_once('lib/database.php'); 
  session_start();
  ?>
</head>
<?php

$errors = ["fnameER" => "", "lnameER" => "", "addressER" => "", "zipcodeER" => "", "cityER" => ""];

if (isset($_POST['submit'])) {

  $fname = filter_input(INPUT_POST, 'fname');
  if (empty($fname) || ctype_space($fname)) {
    $errors["fnameER"] = "Voer je voornaam in!";
  }

  $lname = filter_input(INPUT_POST, 'lname');
  if (empty($lname) || ctype_space($lname)) {
    $errors["lnameER"] = "Voer je achternaam in!";
  }

  $address = filter_input(INPUT_POST, 'address');
  if (empty($address)) {
    $errors["addressER"] = "Voer je address in!";
  }

  $zipcode = filter_input(INPUT_POST, 'zipcode');
  if (empty($zipcode)) {
    $errors["zipcodeER"] = "Voer je postcode in!";
  }

  $city = filter_input(INPUT_POST, 'city');
  if (empty($city)) {
    $errors["cityER"] = "Voer je woonplaats in!";
  }


  if (!array_filter($errors)) {

    $q = "INSERT INTO customer (`fname`, `lname`, `address`, `zipcode`, `city`) VALUES (:fname, :lname, :address, :zipcode, :city)";
    $stmt = $db->prepare($q);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindParam(':city', $city);

    $stmt->execute();

    $_SESSION["fname"] = $_POST['fname'];
    $_SESSION["lname"] = $_POST['lname'];
    $_SESSION["address"] = $_POST['address'];
    $_SESSION["zipcode"] = $_POST['zipcode'];
    $_SESSION["city"] = $_POST['city'];
    header("location:sushi.php");

    // echo '
    //         <h5 style="color:#dc4e68;font-weight: bolder;text-align:center;">uw gegevens is succesvol toegevoegd! </h5>';
    // header("location:sushi.php");
  }
}




?>

<body>
  <img src="./public/img/sushi.jpg" alt="sushi img" width="150px">
  <h2 id="welcome">Welcome in ZuZu restaurant</h2>
  <form action='index.php' class='form' method="POST">
    <p class='field required half'>
      <label class='label required' for='fname'>Voornaam</label>
      <input class='text-input' id='fname' name='fname' required type='text'>

    </p>
    <p class='field required half'>
      <label class='label required' for='lname'>Achternaame</label>
      <input class='text-input' id='lname' name='lname' required type='text'>
    </p>
    <p class='field required half'>
      <label class='label' for='address'>Adres</label>
      <input class='text-input' id='address' name='address' required type='text'>
    </p>
    <p class='field required half'>
      <label class='label' for='zipcode'>Postcode</label>
      <input class='text-input' id='zipcode' name='zipcode' required type='text'>
    </p>
    <p class='field half required '>
      <label class='label' for='city'>Woonplaats</label>
      <input class='text-input' id='city' name='city' required type='text'>
    </p>





    <p class='field half'>
      <input class='button' name='submit' type='submit' value='Send'>
    </p>
  </form>

</body>

</html>