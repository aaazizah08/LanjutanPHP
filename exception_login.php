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

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi username
        if (empty($_POST["u"])) {
            throw new Exception("Masukkan username");
        } else {
            $name = bersihkan_input($_POST["u"]);
        }
        
        // Validasi password
        if (empty($_POST["p"])) {
            throw new Exception("Masukkan password");
        } else {
            $password = bersihkan_input($_POST["p"]);
        }
        
        // Jika tidak ada error, cek username dan password
        if (empty($nameErr) && empty($passwordErr)) {
            // Periksa username dan password, misalnya cek ke database
            $username_dari_database = "root"; // Ganti dengan username yang sesuai
            $password_dari_database = "12345"; // Ganti dengan password yang sesuai
            
            if ($name === $username_dari_database && $password === $password_dari_database) {
                // Jika username dan password cocok, atur session dan redirect ke halaman setelah login
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $name;
                header("Location: halaman_setelah_login.php");
                exit;
            } else {
                // Jika tidak cocok, tampilkan pesan error
                throw new Exception("Username atau password salah.");
            }
        }
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>

<h2>Login</h2>
<?php if(isset($error_message)): ?>
    <div style="color: red;"><?php echo $error_message; ?></div>
<?php endif; ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username: <input type="text" name="u">
    <br><br>
    Password: <input type="password" name="p">
    <br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>
