<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/LibraRead.png">
    <title>LibraRead</title>
    <style>
        * {
            margin: 0;
            padding: 0;
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
            overflow-x: hidden;
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

        .search {
            margin-left: 40vw;
            height: 40px;
            font-size: 32px;
            width: 400px;
            border-radius: 30px;
            background: white url('image/search.png') no-repeat 10px;
            background-size: 34px;
            padding-left: 50px;
        }

        .about{
            background-color: gray;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .photo {
            height: 40vh;
            margin-bottom: 20px;
        }

        .desc {
            color: white;
            font-size: 30px;
            text-align: justify;
        }

        footer {
            background-color: rgba(255, 255, 255, 0.5);
            width: 100vw;
            height: 30vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .fl {
            width: 30vw;
            padding-left: 30px;
            padding-top: 15px;
        }

        .fr {
            width: 30vw;
            margin-right: 10px;
        }

        .fr img {
            width: 25vw;
            margin-right: 10px;
        }

        .icon {
            width: 50px;
            margin-right: 10px;
        }

        .contact{
            font-size: 40px;
        }
    </style>
</head>
<body>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.html" class="about">About</a>
        <form action="" method="get">
            <input type="search" name="find" class="search" placeholder="Search" required>
            <?php
            if (isset($_GET['find'])) {
                $find = $_GET['find'];
                echo "<script> window.location.href='search.php?search=$find';</script>";
            }
            ?>
        </form>
    </nav>

    <a onclick="history.back()"><img src="image/back.png" class="back"></a>
    <div class="container">
        <img src="image/LibraRead.png" class="photo">
        <p class="desc">LibraRead is a digital library that have some of function,</p> 
        <p class="desc">which is platform that provide access to a variety of</p> 
        <p class="desc">books collection virtually. Our platform will give users</p> 
        <p class="desc">convenience for reading anytime anywhere without</p> 
        <p class="desc">having to go to Library.</p> 
        <br>
        <p class="desc">Ver. 1. 0. 0</p> 
        </pre>
    </div>
    <footer>
        <div class="fl">
            <p class="contact">Contact Us: </p>
            <p class="contact"><img src="image/insta.svg" class="icon">@libraread_</p>
            <p class="contact"><img src="image/call.svg" class="icon">085795464781</p>
            <p class="contact"><img src="image/email.svg" class="icon">libraread@gmail.com</p>
        </div>
        <div class="fr">
            <img src="image/logotelu.png">
        </div>
    </footer>
</body>
</html>