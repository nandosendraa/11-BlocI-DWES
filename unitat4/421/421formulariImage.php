<?php
declare(strict_types=1);
$isPost = false;
$errors = [];
$name = "";
$email = "";
$phone = "";
$url = "";
$selectedGenre = "";
$genres = [
    "man" => "Home",
    "woman" => "Dona",
    "nobinary" => "No binari"
];
$selectedHobbies = [];
$hobbies = [
    "reading" => "Lectura",
    "programming" => "Programació",
    "cycling" => "Ciclisme",
    "running" => "Córrer",
    "basket" => "Basquet",
    "cooking" => "Cuinar"
];
$selectedTime = [];
$contact_time = [
    "morning" => "Primera hora (08:00 a 10:00)",
    "before_lunch" => "Abans de dinar (12:00 a 13:00)",
    "after_lunch" => "Després de dinar (14:00 a 16:00)",
    "evening" => "A la nit (20:00 a 22:00)"
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    if (!empty($_POST["name"])) {
        $name = trim(htmlspecialchars($_POST["name"]));
        if (strlen($name) > 99)
            $errors[] = "Nom massa extens";
    } else
        $errors[] = "El nom es obligatori";

    if (!empty($_POST["email"])) {
        if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) == false)
            $errors[] = "Email incorrecte";
        else
            $email = trim(htmlspecialchars($_POST["email"]));
    } else
        $errors[] = "El email es obligatori";

    if (!empty($_POST["phone"])) {
        $phone = trim(htmlspecialchars($_POST["phone"]));
        if (is_string($phone) == true) {
            if (preg_match("/^\d{9}$/", $phone) == 0) {
                $errors[] = "El telèfon ha de contindre 9 digits";
            }
        } else
            $errors[] = "Telèfon incorrecte";
    } else
        $errors[] = "El telèfon es obligatori";

    if (!empty($_POST["url"])) {
        if (filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL) == false)
            $errors[] = "URL incorrecta";
        else
            $url = trim(htmlspecialchars($_POST["url"]));
    } else
        $errors[] = "La URL es obligatoria";

    if (!empty($_POST["genre"])) {
        $selectedGenre = $_POST["genre"];
        // array_keys, array_intersect
        if (!array_key_exists($selectedGenre, $genres)) {
            $errors[] = "El gènere seleccionat no existeix!";
        }
    } else
        $errors[] = "El genere es obligatori";

    if (!empty($_POST["hobbies"])) {
        $selectedHobbies = $_POST["hobbies"];
        foreach ($selectedHobbies as $hobby) {
            // array_keys, array_intersect
            if (!array_key_exists($hobby, $hobbies)) {
                $errors[] = "L'afició seleccionada no existeix!";
            }
        }
    } else
        $errors[] = "El hobbie es obligatori";

    if (!empty($_POST["contact_time"])) {
        $selectedTime = $_POST["contact_time"];
        foreach ($selectedTime as $time) {
            // array_keys, array_intersect
            if (!array_key_exists($time, $contact_time)) {
                $errors[] = "L'hora seleccionada no existeix!";
            }
        }
    } else
        $errors[] = "El contact time es obligatori";
    if ($_FILES['foto']['type']!=='image/jpeg'){
       $errors[] = "El fitxer ha de ser jpg";
    }
    if ($_FILES['foto']['size']>1000000){
        $errors[] = "El fitxer ha de ser mes menut que 1MB";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>421formulariImatge</title>
</head>
<body>

<?php if ($isPost == false || !empty($errors)): ?>
    <?php if (!empty($errors)): ?>
        <h2>Errors</h2>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>
    <form action="421formulariImage.php" method="post" enctype="multipart/form-data">
        <p><label>Nom i cognoms: </label>
            <input type="text" name="name" value="<?= $name ?>"/></p>

        <p><label>Correu electrònic: </label>
            <input type="text" name="email" value="<?= $email ?>"/></p>

        <p><label>Telèfon: </label>
            <input type="text" name="phone" value="<?= $phone ?>"/></p>

        <p><label>URL pàgina personal: </label>
            <input type="text" name="url" value="<?= $url ?>"/></p>

        <p><label>Gènere: </label>
            <?php foreach ($genres as $key => $genere): ?>
                <label for="<?= $key ?>"><?= $genere ?> </label>
                <input <?php echo ($key == $selectedGenre) ? "checked" : ""; ?> id="<?= $key ?>" type="radio"
                                                                                name="genre"
                                                                                value="<?= $key ?>"/>
            <?php endforeach; ?>

        <div><label>Hobbies: </label>
            <?php foreach ($hobbies as $key => $hobby): ?>
                <label>
                <input type="checkbox" name="hobbies[]"
                       value="<?= $key ?>" <?php echo(in_array($key, $selectedHobbies) ? "checked" : ""); ?> />
                </label><?= $hobby ?>
            <?php endforeach; ?>
        </div>

        <p><label for="contact">Contact Time: </label></p>
        <select id="contact" name="contact_time[]" multiple>
            <?php foreach ($contact_time as $key => $time): ?>
                <option <?php echo(in_array($key, $selectedTime) ? "selected" : ""); ?>
                    value="<?= $key ?>"><?= $time ?></option>
            <?php endforeach; ?>
        </select>
        <p><input type="file" name="foto"></p>

        <p><input type="submit" value="Enviar"></p>
    </form>
<?php else: ?>
    <table border="1">
        <tr>
            <th>Nom i cognoms</th>
            <td><?= $name ?></td>
        </tr>
        <tr>
            <th>Correu electrònic</th>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <th>Telèfon</th>
            <td><?= $phone ?></td>
        </tr>
        <tr>
            <th>URL pàgina personal</th>
            <td><?= $url ?></td>
        </tr>
        <tr>
            <th>Gènere</th>
            <td>
                <?php foreach ($selectedGenre as $key => $genere): ?>
                    <?= $genres[$genere] . ", " ?>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <th>Hobbies</th>
            <td>
                <?php foreach ($selectedHobbies as $key => $hobby): ?>
                    <!-- "programming" => "Programació", -->
                    <?= $hobbies[$hobby] . ", " ?>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <th>Contact time</th>
            <td>
                <?php foreach ($selectedTime as $key => $time): ?>
                    <?= $contact_time[$time] . ", " ?>
                <?php endforeach; ?>
            </td>
        </tr>
    </table>
    <?php
        copy($_FILES['foto']['tmp_name'],"uploads/".$_FILES['foto']['name']);
        echo $_FILES['foto']['size'];
    ?>
<?php endif; ?>
</body>
</html>