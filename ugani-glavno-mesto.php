<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ugani-glavno-mesto</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <?php
    //array z državami in glavnimi mesti
    $drzave = array(
      array(
        "drzava" => "Slovenija",
        "glavnoMesto" => "Ljubljana"
        ),
      array(
        "drzava" => "Nemčija",
        "glavnoMesto" => "Berlin"
        ),
      array(
        "drzava" => "Romunije",
        "glavnoMesto" => "Bukarešta"
        ),
      array(
        "drzava" => "Madžarska",
        "glavnoMesto" => "BudiMpešta"
        ),
      array(
        "drzava" => "Španija",
        "glavnoMesto" => "Madrid"
        )
      );

    //preštej elemente v arrayu
     $stDrzav = count($drzave);

    // Pogledamo če smo si že poslali ključ za izbor države preko hidden inputa
     if (isset($_POST["key"])) {
        $izbranaDrzava = $_POST["key"];
     } else {
        $izbranaDrzava = rand(0, $stDrzav-1);
     }






    if (isset($_POST["poslanOdgovor"])) {
      //primerjaj odgovor če je forma oddana
        $poslanOdgovor = $_POST["poslanOdgovor"];

        $pravilenOdgovor = $drzave[$izbranaDrzava]["glavnoMesto"];

        if(strtolower($poslanOdgovor) == strtolower($pravilenOdgovor)) {
          echo 'odgovor je pravilen <a href="ugani-glavno-mesto.php">Ugibaj ponovno</a>';
        } else {
          echo "odgovor ni pravilen";
        }
    }

    ?>




        
        <form action="ugani-glavno-mesto.php" method="post">
            <!-- tukaj vpiši hidden input -->
            <!-- Hidden input v katerega shranjujemo trenutno število -->
            <input type="hidden" name="key" value="<?php echo $izbranaDrzava;?>">
              <div class="form-group">
                
                <label for="mesto">Glavno mesto države <?php echo $drzave[$izbranaDrzava]["drzava"]; ?> je:</label>
                <input type="text" clss="form-control" name="poslanOdgovor" placeholder="vpisi mesto">
              </div>
              <button type="submit" class="btn btn-default">Oddaj</button>
            </form>
  </body>
</html>