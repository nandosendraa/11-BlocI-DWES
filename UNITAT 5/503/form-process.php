<?php
declare(strict_types=1);
session_start();

$isPost = false;
$errors = [];
$pdo = new PDO("mysql:host=localhost; dbname=503", "root", "root");
$hobbies_id = [];
$times_id = [];

$data["name"] = "";
$data["email"] = "";
$data["phone"] = "";
$data["url"] = "";
$data["selectedGenre"] = "";
$data["selectedHobbies"] = [];
$data["selectedTime"] = [];

require 'inc/data.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    if (!empty($_POST["name"])) {

        $name = trim(htmlspecialchars($_POST["name"]));

        if (strlen($name) > 99)
            $errors[] = "Nom massa extens";
        else
            $data["name"] = $name;
    } else
        $errors[] = "El nom es obligatori";

    if (!empty($_POST["email"])) {
        if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) == false)
            $errors[] = "Email incorrecte";
        else
            $data["email"] = trim(htmlspecialchars($_POST["email"]));
    } else
        $errors[] = "El email es obligatori";

    if (!empty($_POST["phone"])) {
        $phone = trim(htmlspecialchars($_POST["phone"]));
        $data["phone"] = $phone;
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
            $data["url"] = trim(htmlspecialchars($_POST["url"]));

    } else
        $errors[] = "La URL es obligatoria";

    if (!empty($_POST["genre"])) {
        $selectedGenre = $_POST["genre"];
        // array_keys, array_intersect
        if (!array_key_exists($selectedGenre, $genres)) {
            $errors[] = "El gènere seleccionat no existeix!";
        } else {
            $data["selectedGenre"] = $selectedGenre;
            if ($selectedGenre == "man")
                $genre_id = 1;
            else if ($selectedGenre == "nobinary")
                $genre_id = 3;
            else if ($selectedGenre == "woman")
                $genre_id = 2;
        }
    } else
        $errors[] = "El genere es obligatori";


    if (!empty($_POST["hobbies"])) {
        $selectedHobbies = $_POST["hobbies"];
        foreach ($selectedHobbies as $hobby) {
            // array_keys, array_intersect
            if (!array_key_exists($hobby, $hobbies)) {
                $errors[] = "L'afició seleccionada no existeix!";
            } else
                $data["selectedHobbies"][] = $hobby;
        }
    } else
        $errors[] = "El hobbie es obligatori";

    if (!empty($_POST["contact_time"])) {
        $selectedTime = $_POST["contact_time"];
        foreach ($selectedTime as $time) {
            // array_keys, array_intersect
            if (!array_key_exists($time, $contact_time)) {
                $errors[] = "L'hora seleccionada no existeix!";
            } else
                $data["selectedTime"][] = $time;
        }
    } else
        $errors[] = "El contact time es obligatori";
}
foreach ($selectedHobbies as $hobby) {
    if ($hobby == "reading")
        $hobby_id=1;
    else if ($hobby == "programming")
        $hobby_id=2;
    else if ($hobby == "cycling")
        $hobby_id=3;
    else if ($hobby == "running")
        $hobby_id=4;
    else if ($hobby == "basket")
        $hobby_id=5;
    else if ($hobby == "cooking")
        $hobby_id=6;
    else if ($hobby == "fishing")
        $hobby_id=7;
    $hobbies_id[]= $hobby_id;
}

foreach ($selectedTime as $time) {
    if ($time == "morning")
        $time_id=1;
    else if ($time == "before_lunch")
        $time_id=2;
    else if ($time == "after_lunch")
        $time_id=3;
    else if ($time == "evening")
        $time_id=4;
    $times_id[]= $time_id;
}

 if ($isPost == false || !empty($errors)) {
     $_SESSION["errors"] = $errors;
     $_SESSION["data"] = $data;
     header('Location: form.php');
     exit();
 } else {
     $_SESSION["data"] = $data;
     $stmt = $pdo->prepare("INSERT INTO contact_info (nom_cognoms, email, telefon, url, id_genre) VALUES (:nom_cognoms, :email, :telefon, :url, :id_genre)");
     $stmt->bindParam(':nom_cognoms', $data['name']);
     $stmt->bindParam(':email', $data['email']);
     $stmt->bindParam(':telefon', $data['phone']);
     $stmt->bindParam(':url', $data['url']);
     $stmt->bindParam('id_genre',$genre_id);
     $stmt->execute();
     $user_id= $pdo->lastInsertId();
     foreach ($hobbies_id as $id){
         $hobby_stmt = $pdo->prepare("INSERT INTO contact_info_hobby (id_contact_info, id_hobby) VALUES (:id_contact_info, :id_hobby)");
         $hobby_stmt->bindValue(':id_contact_info', $user_id);
         $hobby_stmt->bindValue(':id_hobby', $id);
         $hobby_stmt->execute();

     }
     foreach ($times_id as $id){
         $times_stmt = $pdo->prepare("INSERT INTO contact_info_contact_time (id_contact_info, id_contact_time) VALUES (:id_contact_info, :id_time)");
         $times_stmt->bindValue(':id_contact_info', $user_id);
         $times_stmt->bindValue(':id_time', $id);
         $times_stmt->execute();

     }
     exit();
 }

