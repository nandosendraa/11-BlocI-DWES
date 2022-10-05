<?php
declare(strict_types=1);
include 'Employee.php';
$emp = new Employee('Paco','Ferrer');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>250</title>
</head>
<body>
<?php
    Employee::addPhone('666777888');
    Employee::addPhone('666777888');
    echo Employee::toHtml($emp);
?>
</body>

</html>
