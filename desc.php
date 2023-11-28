<?php
ob_start();
include("action/connect.php");
$id_buku = $_GET['id_buku'];
$sql = "SELECT * FROM buku WHERE id_buku=$id_buku";
$result = mysqli_query($connect, $sql);

$row = mysqli_num_rows($result);
if ($row > 0) {
    $a = mysqli_fetch_assoc($result);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="image/LibraRead.png">
        <title>LibraRead</title>
        <style>
            * {
                margin: 0;
                border: 0;
                
            }

            nav {
                display: flex;
                background-color: #d9d9d9;
                align-items: center;
            }

            .logo {
                height: 100px;
                margin: 10px 0 20px 30px;
            }

            a {
                text-decoration: none;
                color: black;
                margin: 0 0 0 50px;
                font-size: 50px;
            }

            body {
                background-image: url('image/bgwebjadi.png');
                background-size: cover;
                background-repeat: no-repeat;
                /* overflow: hidden; */
            }

            .back {
                height: 70px;
                margin: 20px;
                float: left;
            }

            .back::after {
                content: '';
                display: block;
                clear: both;
            }

            [class*="col-"] {
                float: left;
                padding: 15px;
            }

            .col-1 {
                width: 8.33%;
            }

            .col-2 {
                width: 16.66%;
            }

            .col-3 {
                width: 25%;
            }

            .col-4 {
                width: 33.33%;
            }

            .col-5 {
                width: 41.66%;
            }

            .col-6 {
                width: 50%;
            }

            .col-7 {
                width: 58.33%;
            }

            .col-8 {
                width: 66.66%;
            }

            .col-9 {
                width: 75%;
            }

            .col-10 {
                width: 83.33%;
            }

            .col-11 {
                width: 91.66%;
            }

            .col-12 {
                width: 100%;
            }

            .thumbnail {
                margin-top: 20vh;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #d9d9d9;
                width: 300px;
                height: 400px;
                margin-left: 15vw;
            }

            .thumbnail img {
                width: 200px;
            }

            .container {
                margin-top: 18vh;
                margin-left: 20px;
            }

            .container p {
                font-size: 30px;
                color: white;
                margin-bottom: 5px;
            }

            .container .bold {
                font-weight: bold;
            }

            .button {
                display: flex;
                align-items: center;
                justify-content: start;
            }

            .read {
                background-color: #ff3d00;
                display: flex;
                align-items: center;
                justify-content: center;
                background-image: url('https://cdn-icons-png.flaticon.com/128/828/828370.png');
                background-size: 40px;
                background-repeat: no-repeat;
                width: 250px;
                height: 60px;
                font-size: 40px;
                background-position: 30px;
                margin-left: 20px;
                margin-top: 20px;
                cursor: pointer;
                float: left;
            }

            .download {
                background-color: #00C008;
                display: flex;
                align-items: center;
                justify-content: center;
                background-image: url('https://cdn-icons-png.flaticon.com/128/786/786223.png');
                background-size: 40px;
                background-repeat: no-repeat;
                width: 340px;
                height: 60px;
                font-size: 40px;
                background-position: 30px;
                margin-left: 20px;
                margin-top: 20px;
                cursor: pointer;
                float: left;
            }

            .pdf-container {
                width: 100%;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .pdf-object {
                width: 100%;
                height: 100%;
            }
        </style>
    </head>

    <body>
        <nav>
            <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.html">About</a>
        </nav>
        <a onclick="history.back()"><img src="image/back.png" class="back"></a>
        <div class="col-4 thumbnail">
            <img src="image/LibraRead.png">
        </div>
        <div class="container col-5">
            <p>Title :</p>
            <p class="bold"><?php echo $a['title'] ?></p>
            <p>Author :</p>
            <p class="bold"><?php echo $a['author'] ?></p>
            <p>Publisher :</p>
            <p class="bold"><?php echo $a['publisher'] ?></p>
            <p>Publication year :</p>
            <p class="bold"><?php echo $a['pubyear'] ?></p>
            <p>Subject :</p>
            <p class="bold"><?php echo $a['subject'] ?></p>
            <div class="button">
                <form action="" method="post">
                    <button name="read" class="read">Read</button>
                    <button name="download" class="download">Download</button>
                <?php
                if (isset($_POST['download'])) {
                    $filename = $a['file']; 
                    $file = 'file/'. $filename; 

                    header('Content-type: application/pdf');
                    header('Content-Disposition: attachment; filename="' . $filename . '"');
                    readfile($file);
                    exit;
                }
            }

                ?>
                </form>
            </div>

        </div>
        <!--segini-->
        <?php

        if (isset($_POST['read'])) {

        ?>
            <br>
            <div class="pdf-container">
                <embed class="pdf-object" src="file/<?php echo $a['file'] ?>" type="application/pdf" />
            </div>
        <?php
        }
        ob_end_flush();
        ?>
        <!--sampe sini-->
    </body>

    </html>