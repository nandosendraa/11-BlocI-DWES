<?php

$errors = [];
$isPost = false;
$nom = "";
$email = "";
$phone = "";
$url = "";
$genere="";
$hobbies=[];
$horari=[];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $url = $_POST["url"];
    $genere = $_POST["genere"] ?? "";
    $hobbies = $_POST["hobbies"] ?? [];
    $strHobbies = '';
    foreach ($hobbies as $hobby) {
        $strHobbies .= $hobby . ", ";
    }
    $horari = $_POST["horari"] ?? [];
    $strHorari = '';
    foreach ($horari as $hora) {
        $strHorari .= $hora . ", ";
    }



    if ( empty($nom) || strlen($nom)>100)
        $errors[] = "El nom no es correcte";

    if (empty($phone) ||strlen($phone)>9)
        $errors[] = "El telefon es invalid";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "El correu no es valid";

    if (!filter_var($url, FILTER_VALIDATE_URL))
        $errors[] = "La URL no es valid";
    if ($genere == "")
        $errors[] = "Has de marcar el genere";
    if (empty($hobbies))
        $errors[] = "Has de marcar els teus hobbies";
    if (empty($horari))
        $errors[] = "Has de marcar un horari";

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>406</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>405</title>
</head>
<body>
<?php if (!count($errors)==0) : ?>
<?php foreach ($errors as $error)
echo $error."<br>"
?>
<?php endif;?>
<?php if(!$isPost || !empty($errors)) :?>
<form action="406formulariUnic.php" method="POST">
    <p>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" <?php if ($nom != ""):?>value="<?=$nom?>"<?php endif; ?>>
    </p>
    <p>
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" <?php if ($email != ""):?>value="<?=$email?>"<?php endif; ?>>
    </p>
    <p>
        <label for="phone">Phone :</label>
        <input type="number" id="phone" name="phone" <?php if ($phone != ""):?>value="<?=$phone?>"<?php endif; ?>>
    </p>
    <p>
        <label for="url">Url :</label>
        <input type="text" id="url" name="url" <?php if ($url != ""):?>value="<?=$url?>"<?php endif; ?>>
    </p>
    <p>
        <input type="radio" id="Men" value="Men" name="genere" <?php if($genere=="Men") echo 'checked="checked"'; ?>>
        <label for="Men">Men</label>
        <input type="radio" id="Women" value="Women" name="genere" <?php if($genere=="Women") echo 'checked="checked"'; ?>>
        <label for="Women">Women</label>
        <input type="radio" id="No-binary" value="No-binary" name="genere" <?php if($genere=="No-binary") echo 'checked="checked"'; ?>>
        <label for="No-binary">No-binary</label>
    </p>
    <p>
        <input type="checkbox" value="lectura" name="hobbies[]"
            <?php if(in_array("lectura",$hobbies)) echo 'checked="checked"'; ?>>
        <label> Lectura</label>

        <input type="checkbox" value="programacio" name="hobbies[]"
            <?php if(in_array("programacio",$hobbies)) echo 'checked="checked"'; ?>>
        <label> Programacio</label>

        <input type="checkbox" value="ciclisme" name="hobbies[]"
            <?php if(in_array("ciclisme",$hobbies)) echo 'checked="checked"'; ?>>
        <label> Ciclisme</label>

        <input type="checkbox" value="correr" name="hobbies[]"
            <?php if(in_array("correr",$hobbies)) echo 'checked="checked"'; ?>>
        <label> Correr</label>
    </p>
    <p>
        <select id="contact_time" name="horari[]" multiple="multiple">
            <option id="PrimeraHora" value="PrimeraHora"
                <?php if(in_array("PrimeraHora",$horari)) echo 'selected'; ?>>Primera hora (08:00 a 10:00)</option>
            <option id="AbansDeDinar" value="AbansDeDinar"
                <?php if(in_array("AbansDeDinar",$horari)) echo 'selected'; ?>>Abans de dinar (12:00 a 13:00)</option>
            <option id="DespuesDeDinar" value="DespuesDeDinar"
                <?php if(in_array("DespuesDeDinar",$horari)) echo 'selected'; ?>>Després de dinar (14:00 a 16:00)</option>
            <option id="nit" value="nit"
                <?php if(in_array("nit",$horari)) echo 'selected'; ?>>A la nit (20:00 a 22:00)</option>
        </select>
    </p>
    <input type="submit">
</form>
<?php endif;?>
<?php if (count($errors)==0 && $isPost) :?>
    <table>
        <tr>
            <th>Nom</th>
            <td><?=$nom?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$email ?></td>
        </tr>
        <tr>
            <th>Telèfon</th>
            <td><?=$phone?></td>
        </tr>
        <tr>
            <th>Url</th>
            <td><?=$url?></td>
        </tr>
        <tr>
            <th>Genere</th>
            <td><?=$genere?></td>
        </tr>
        <tr>
            <th>Hobbies</th>
            <td><?=$strHobbies?></td>
        </tr>
        <tr>
            <th>Horari</th>
            <td><?=$strHorari?></td>
        </tr>
    </table>

<?php endif; ?>


</body>
</html>