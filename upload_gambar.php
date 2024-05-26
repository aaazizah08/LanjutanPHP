<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload file</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="234311022">
    <meta name="author" content="Nur Azizah P">
</head>
<body>
    
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <p><label>Pilih gambar yang akan di upload: </label><br>
        <input type="file" name="gambar" id="gambar1"></p>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
$uploadOK = 1;

if (isset($_POST["submit"])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $tipeGambar = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if a file is selected
    if(empty($_FILES["gambar"]["name"])) {
        echo "Silakan pilih file untuk diupload.";
        $uploadOK = 0;
    }

    // Check if file is an image
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        echo "File berupa citra/gambar - " . $check["mime"] . "." . "<br>";
        $uploadOK = 1;
        //Simpan ke dalam folder gambar
    } else {
        echo "File bukan gambar.";
        $uploadOK = 0;
    }

    // Deteksi apakah ada file dengan nama yang sama
    if (file_exists($target_file)) {
        echo "Sorry, file already exists. <br> ";
        $uploadOK = 0;
    }

    // Check file size
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, file anda terlalu besar. <br>";
        $uploadOK = 0;
    }

    // Filter format
    if ($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar != "jpeg"
        && $tipeGambar != "gif") {
        echo "Sorry, hanya file JPG, JPEG, PNG & GIF.";
        $uploadOK = 0;
    }

    // Check if $uploadOK is set to 0 by an error
    if ($uploadOK == 0) {
        echo "Sorry, file anda gagal upload. <br>";
    } else {
        // Proses upload file
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "file ". htmlspecialchars( basename( $_FILES["gambar"]["name"])). " berhasil upload.";
        } else {
            echo "Sorry, ada error saat upload.";
        }
    }
}
?>
</body>
</html>
