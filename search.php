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
            width: 100%;
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
            margin: 40px 40px;
        }

        .thumbnail img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
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

        .tag {
            margin: 50px 0 20px 50px;
            font-size: 40px;
            color: white;
        }

        .sort {
            background-color: transparent;
            margin-right: 20px;
            font-size: 25px;
            color: white;
            cursor: pointer;
        }

        .group {
            margin-left: 50px;
        }

        .nf {
            color: white;
            font-size: 40px;
            margin-left: 50px;
            margin-top: 25px;
        }

        .box {
            display: flex;
            flex-direction: row;
        }

        .box-container {
            float: left;
        }

        .container {
            margin: 50px 10px;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <nav>
        <img src="image/LibraRead.png" class="logo"> <a href="index.php" class="home">Home</a> <a href="about page/about-page.html">About</a>
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
    <p class="tag">Sort by: </p>
    <form action="" method="post">
        <div class="group">
            <button name="all" class="sort">All</button>
            <button name="title" class="sort">Title</button>
            <button name="author" class="sort">Author</button>
            <button name="publisher" class="sort">Publisher</button>
        </div>
        <?php
        include("action/connect.php");
        $search = $_GET['search'];
        $row;
        $result;
        $sql;
        if (isset($_POST['title'])) {
            $sql = "select * from buku where title like '%" . $search . "%'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_num_rows($result);
        } elseif (isset($_POST['author'])) {
            $sql = "select * from buku where author like '%" . $search . "%'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_num_rows($result);
        } elseif (isset($_POST['publisher'])) {
            $sql = "select * from buku where publisher like '%" . $search . "%'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_num_rows($result);
        } else {
            $sql = "select * from buku where title like '%" . $search . "%' or author like '%" . $search . "%' or publisher like '%" . $search . "%'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_num_rows($result);
        }
        if ($row > 0) {
            $loop = 0;
            while ($a = mysqli_fetch_assoc($result)) {
        ?>
    </form>
    <div class="box-container">
        <div class="box">
            <a href="desc.php?id_buku=<?php echo $a['id_buku'] ?>" class="thumbnail"><img src="<?php echo $a['cover'] ?>"></a>
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
    </div>
<?php
            }
        } else {
?>
<h1 class="nf">Not found</h1>
<?php
        }

?>

</body>

</html>