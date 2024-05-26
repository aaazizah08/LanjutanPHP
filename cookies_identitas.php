<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tempat = $_POST['tempat'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];

    // Set cookies to store form data
    setcookie('nim', $nim, time() + (86400 * 30), "/");
    setcookie('nama', $nama, time() + (86400 * 30), "/");
    setcookie('email', $email, time() + (86400 * 30), "/");
    setcookie('tempat', $tempat, time() + (86400 * 30), "/");
    setcookie('ttl', $ttl, time() + (86400 * 30), "/");
    setcookie('alamat', $alamat, time() + (86400 * 30), "/");
    setcookie('gender', $gender, time() + (86400 * 30), "/");

    // Redirect back to the form page
    header('Location: index_cookies.php');
    exit();
}
?>
