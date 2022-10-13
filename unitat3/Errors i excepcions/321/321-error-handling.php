<?php
declare(strict_types=1);
include 'Employee.php';

?>
    <!DOCTYPE html>
    <html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>320</title>
</head>
<body>
<?php
try {
    $empleado = new Employee("Nando","Sendra",-100);
}
catch (InvalidWageException $exception){
    echo "el salari no pot ser negatiu";
}
?>
</body>

    </html><?php
