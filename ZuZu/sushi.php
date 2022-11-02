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

$errors = ['amountER' => ''];

if (isset($_POST['submit'])) {
    if (isset($_POST['prod'])) {
        $type = $_POST['prod'];
    } else {
        $errors['amountER'] = "Kies een sushi!";
    }
    if (isset($_POST['amount'])) {
        $quantity = $_POST['amount'];
    }
    // if(empty($amount)){
    //      $errors['amountER'] = "Voer je bestelling in!";
    //  }
    if ($amount > 20) {
        $errors['amountER'] = "U mag allen 20 stukjes bestellen!";
    }
    if (!array_filter($errors)) {

        $_SESSION["order"] = $_POST['prod'];
        $_SESSION["amount"] = $_POST['amount'];
        header("location:order.php");
    }
}

?>

<body id="sushi">
    <div class="container">
        <form action="sushi.php" method="post">
            <?php
            $sushis  = getSushis();
            // $sushiCount = count($sushis); 

            // var_dump($sushiCount);
            foreach ($sushis as $data) : ?>

                <input type="hidden" name="id" value="<?= $data->id ?>">
                <img class='prod_pic' src="<? //= $data->picture 
                                            ?>">
                <input type="checkbox" name="prod" value="<?= $data->name ?>"><span style="color: darkblue; font-weight:bold "><?= $data->name ?></span> <br>
                <p><?= "€ " . number_format($data->price, 2, ",", ".") ?></p>
                <select name="amount" id="amount">
                    <option value="" disabled selected>kies hoeveel stuks!</option>
                    <?php for ($i = 1; $i <= $data->amount; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
                <hr>
            <?php endforeach; ?>
            <h1 style="color: red;" class="error"><?= $errors['amountER'] ?></h1>
            <button type="submit" name="submit">Bestel</button>
            <br>
        </form>
    </div>

</body>

</html>