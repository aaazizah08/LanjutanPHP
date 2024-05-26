<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Konversi ke Json</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="234311022">
    <meta name="author" content="Nur Azizah P">
</head>
<body>
    <h3>Tampilan nama dan umur  dengan konversi ke dalam Json</h3>
<?php
// Array dengan data nama dan umur
$data = array(
    array("nama" => "Tata", "umur" => 18),
    array("nama" => "Lili", "umur" => 19),
    array("nama" => "Doni", "umur" => 20),
    array("nama" => "Cici", "umur" => 21),
    array("nama" => "Lulu", "umur" => 22),
    array("nama" => "Era", "umur" => 23),
    array("nama" => "Fira", "umur" => 24),
    array("nama" => "Ria", "umur" => 25),
    array("nama" => "Sita", "umur" => 26),
    array("nama" => "Lia", "umur" => 27),
    array("nama" => "Puri", "umur" => 28),
    array("nama" => "Ani", "umur" => 29),
    array("nama" => "Bila", "umur" => 30),
    array("nama" => "Gina", "umur" => 31),
    array("nama" => "Riri", "umur" => 32)
);

// Konversi array menjadi JSON
$json_data = json_encode($data);

// Tampilkan JSON
echo $json_data;
?>

</body>
</html>

