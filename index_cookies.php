<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }
    form {
        width: 600px;
        padding: 10px;
    }
    .button-container {
        margin-top: 0;       /*Menambahkan ruang atas*/
    }
    label {
        display: inline;
    }
    form div {
        margin: 10px;
    }
</style>
<body>
    <?php
    // Check if cookies exist and retrieve form data
    $cookie_nim = isset($_COOKIE['nim']) ? $_COOKIE['nim'] : '';
    $cookie_nama = isset($_COOKIE['nama']) ? $_COOKIE['nama'] : '';
    $cookie_email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
    $cookie_tempat = isset($_COOKIE['tempat']) ? $_COOKIE['tempat'] : '';
    $cookie_ttl = isset($_COOKIE['ttl']) ? $_COOKIE['ttl'] : '';
    $cookie_alamat = isset($_COOKIE['alamat']) ? $_COOKIE['alamat'] : '';
    $cookie_gender = isset($_COOKIE['gender']) ? $_COOKIE['gender'] : '';
    ?>

    <form method="post" action="cookies_identitas.php">
        <div>
            <label for="nim">Nim:</label>
            <input type="text" id="nim" name="nim" value="<?php echo $cookie_nim; ?>">
        </div>
        <div>
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $cookie_nama; ?>">
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $cookie_email; ?>">
        </div>
        <div>
            <label for="ttl">Tempat, Tanggal Lahir:</label>
            <input type="text" id="tempat" name="tempat" value="<?php echo $cookie_tempat; ?>">
            <input type="date" id="ttl" name="ttl" value="<?php echo $cookie_ttl; ?>">
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $cookie_alamat; ?>">
        </div>
        <div>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="Laki-laki" <?php if($cookie_gender == 'Laki-laki') echo 'checked'; ?>>
            <label for="laki_laki">Laki-laki</label>
            <input type="radio" name="gender" value="Perempuan" <?php if($cookie_gender == 'Perempuan') echo 'checked'; ?>>
            <label for="Perempuan">Perempuan</label>
        </div>
        <input type="submit" value="Kirim">
    </form>
</body>
</html>
