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
            overflow: hidden;
        }

        .home {
            background-color: gray;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .thumbnail {
            background-color: rgb(177, 177, 177);
            width: 200px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 40px;
        }

        .thumbnail img {
            width: 150px;
        }

        .container {
            margin: 50px 20px;
            float: left;
        }

        .container p {
            font-size: 24px;
            margin-bottom: 4px;
            color: white;
        }

        .menu {
            height: 70px;
            margin: 20px;
            float: left;
        }

        .menu::after {
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

        * {
            margin: 0px;
            padding: 0px;
        }

        #sidebar {
            position: absolute;
            width: 300px;
            height: 100%;
            background: #E2923E;
            left: -300px;
            transition: .4s;
        }

        #sidebar ul li {
            list-style: none;
            color: #fff;
            font-size: 20px;
            padding: 26px 24px;
        }

        #sidebar .toggle-btn {
            position: absolute;
            top: 30px;
            left: 330px;
        }

        .toggle-btn span {
            width: 45px;
            height: 4px;
            background: #FFFFFF;
            display: block;
            margin-top: 9px;
        }

        #sidebar.active {
            left: 0;
        }

        #sidebar .list-items .icons a {
            height: 100%;
            width: 40px;
            display: block;
            margin: 0 5px;
            font-size: 18px;
            color: #f2f2f2;
            background: #4a4a4a;
            border-radius: 5px;
            border: 1px solid #383838;
            transition: all 0.3s ease;
        }

        #sidebar .list-items .icons a:hover {
            background: #404040;
        }

        .list-items .icons a:first-child {
            margin-left: 0px;
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

        .
    </style>
</head>

<body>
    <?php
    // session_start();
    // if (isset($_SESSION['username'])) {
    //     $username = $_SESSION['username'];
    // } else {
    //     header('Location: login.php');
    //     exit;
    // }
    ?>
    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about.html">About</a>
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

    <div id="sidebar">
        <<<<<<< HEAD <div class="toggle-btn" onclick="show()">
            <span></span>
            <span></span>
            <span></span>
    </div>
    <ul class="list-items">
        <li style="background-color: #C47521;"><img src="image/user.png" width="25px"><a href="#" style="color:white; font-size:25px;"><?php echo $username ?></a></li>
        <li style="background-color: #C47521;"><img src="image/upload.png" width="25px"><a href="upload.php" style="color:white; font-size:25px;">Upload</a></li>
        <li style="background-color: #C47521;"><img src="image/logout.png" width="25px"><a href="login.php" style="color:white; font-size:25px;">Logout</a></li>
        =======
        <div class="toggle-btn" onclick="show()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="list-items">
            <li <?php if ($page == '') { ?>style="background-color: #C47521;" <?php } ?>><img src="image/user.png" width="25px"><a href="#" style="color:white; font-size:25px;">Username</a></li>
            <li <?php if ($page == 'upload') { ?>style="background-color: #C47521;" <?php } ?>><img src="image/upload.png" width="25px"><a href="#" style="color:white; font-size:25px;">Upload</a></li>
            <li <?php if ($page == 'logout') { ?>style="background-color: #C47521;" <?php } ?>><img src="image/logout.png" width="25px"><a href="#" style="color:white; font-size:25px;">Logout</a></li>
            >>>>>>> 4e3875aa09d56236c9e7e2f4ac5d4a7aea2d12eb
        </ul>
        </div>
        <script>
            function show() {
                document.getElementById('sidebar').classList.toggle('active');
            }
        </script>
        <br><br><br><br>
        <a href="foryou.php" style="color:white;">For You ></a>
        <br>
        <?php
        include("action/connect.php");
        $sql = "select * from buku";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $loop = 0;
            while ($a = mysqli_fetch_assoc($result)) {
        ?>
                <div class="view">
                    <a href="desc.php?id_buku=<?php echo $a['id_buku'] ?>" class="thumbnail"><img src="image/LibraRead.png"></a>
                    <div class="container">
                        <p>Title :</p>
                        <p><?php echo $a['title'] ?></p>
                        <p>Author :</p>
                        <p><?php echo $a['author'] ?></p>
                        <p>Publisher :</p>
                        <p><?php echo $a['publisher'] ?></p>
                        <p>Publication year :</p>
                        <p><?php echo $a['pubyear'] ?></p>
                    </div>
                </div>
        <?php
                $loop++;
                if ($loop >= 3) {
                    break;
                }
            }
        }
        ?>
        <a href="all.php">
            <div class="thumbnail">
                <center>
                    <img style="width:70px;" src="image/right.png">
                    <p style="font-size:30px;"><br>See all</p>
                </center>
            </div>
        </a>
        <br>
        <a href="foryou.php" style="color:white;">Top Rated ></a>
        <br>
        <?php
        include("action/connect.php");
        $sql = "select * from buku";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $loop = 0;
            while ($a = mysqli_fetch_assoc($result)) {
        ?>
                <a href="desc.php?id_buku=<?php echo $a['id_buku'] ?>" class="thumbnail"><img src="image/LibraRead.png"></a>
                <div class="container">
                    <p>Title :</p>
                    <p><?php echo $a['title'] ?></p>
                    <p>Author :</p>
                    <p><?php echo $a['author'] ?></p>
                    <p>Publisher :</p>
                    <p><?php echo $a['publisher'] ?></p>
                    <p>Publication year :</p>
                    <p><?php echo $a['pubyear'] ?></p>
                </div>
        <?php
                $loop++;
                if ($loop >= 3) {
                    break;
                }
            }
        }
        ?>
        <a href="all.php">
            <div class="thumbnail">
                <center>
                    <img style="width:70px;" src="image/right.png">
                    <p style="font-size:30px;"><br>See all</p>
                </center>
            </div>
        </a>
</body>

</html>