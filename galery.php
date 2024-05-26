<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 10px;
            padding: 20px;
        }
        .gallery-item {
            position: relative;
            width: 100%;
            padding-top: 100%; /* 1:1 aspect ratio (square) */
            overflow: hidden;
            border-radius: 5px;
        }
        .gallery img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
        }
    </style>
</head>
<body>

<div class="gallery">
    <?php
    $fileList = glob('gambar/*');
    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            echo '<div class="gallery-item"><img src="' . $filename . '" alt="gambar"></div>';
        }
    }
    ?>
</div>

</body>
</html>
