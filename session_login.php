<?php
session_start();

// Fungsi untuk membersihkan input
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Inisialisasi variabel
$name = $password = "";
$nameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi username
    if (empty($_POST["u"])) {
        $nameErr = "Masukkan username";
    } else {
        $name = bersihkan_input($_POST["u"]);
    }
    
    // Validasi password
    if (empty($_POST["p"])) {
        $passwordErr = "Masukkan password";
    } else {
        $password = bersihkan_input($_POST["p"]);
    }
    
    // Jika tidak ada error, cek username dan password
    if (empty($nameErr) && empty($passwordErr)) {
        // Periksa username dan password, misalnya cek ke database
        $username_dari_database = "root"; // Ganti dengan username yang sesuai
        $password_dari_database = ""; // Ganti dengan password yang sesuai
        
        if ($name === $username_dari_database && $password === $password_dari_database) {
            // Jika username dan password cocok, atur session dan redirect ke halaman setelah login
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $name;
            header("Location: halaman_setelah_login.php");
            exit;
        } else {
            // Jika tidak cocok, tampilkan pesan error
            $passwordErr = "Username atau password salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>

<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username: <input type="text" name="u">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Password: <input type="password" name="p">
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>
