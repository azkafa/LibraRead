<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraRead</title>
    <link rel="shortcut icon" href="image/LibraRead.png">
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
            overflow: hidden;
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

        .upload {
            float: left;
        }

        #fileInput {
            display: none;
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

        .container {
            margin-top: 120px;
            display: flex;
            flex-direction: column;
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
            ;
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

        #input {
            margin: 0 0 20px 20px;
            width: 80%;
            height: 50px;
            font-size: 32px;
            border-radius: 15px;
            border: 0;
            padding-left: 10px;
        }

        .upload {
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://cdn-icons-png.flaticon.com/128/9355/9355940.png');
            background-size: 40px;
            background-repeat: no-repeat;
            width: 250px;
            height: 60px;
            font-size: 40px;
            background-color: rgb(40, 236, 40);
            background-position: 10px;
            margin-left: 20px;
            margin-top: 20px;
            cursor: pointer;
        }

        .cancel {
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://cdn-icons-png.flaticon.com/128/1828/1828778.png');
            background-size: 40px;
            background-repeat: no-repeat;
            width: 250px;
            height: 60px;
            font-size: 40px;
            background-color: rgb(255, 0, 0);
            background-position: 10px;
            margin-left: 20px;
            margin-top: 20px;
            border: 1px solid black;
            font-family: Arial, Helvetica, sans-serif;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .image-preview {
            display: flex;
            background: white;
            height: 400px;
            width: 350px;
            background-repeat: no-repeat;
            font-size: 30px;
            background-position: 50%;
            align-items: center;
            justify-content: center;
            float: right;
            margin-top: 120px;
            color: gray;
            cursor: pointer;
        }

        .image-preview span {
            margin-top: 20px;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .file {
            background-color: white;
            width: 80%;
            height: 50px;
            margin: 0 0 20px 20px;
            border-radius: 15px;
            font-size: 32px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 10px;
            color: gray;
        }

        .file input{
            font-size: 20px;
            margin-left: 5px;
        }

        p, input::placeholder{
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
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

    <a onclick="history.back()"><img src="image/back.png" class="back"></a>
    <form action="action/uploadac.php" method="post" enctype="multipart/form-data">
        <div class="col-4">
            <input type="file" id="fileInput" accept="image/*" onchange="previewImage(event)" name="cover">
            <label for="fileInput" id="image-preview" class="image-preview">
                <span>Upload cover</span>
            </label>
            <script>
                function previewImage(event) {
                    var input = event.target;
                    var preview = document.getElementById('image-preview');
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var image = document.createElement('img');
                            image.src = e.target.result;
                            preview.innerHTML = '';
                            preview.appendChild(image);
                        };

                        reader.readAsDataURL(input.files[0]);
                    } else {
                        preview.innerHTML = '<span>Upload cover</span>';
                    }
                }
            </script>
        </div>
        <div class="container col-5">
            <input type="text" id="input" name="title" placeholder="Title" required>
            <input type="text" id="input" name="author" placeholder="Author" required>
            <input type="text" id="input" name="publisher" placeholder="Publisher" required>
            <input type="text" id="input" name="pubyear" placeholder="Publication Year" required>
            <input type="text" id="input" name="subject" placeholder="Subject" required>
            <div class="file">
                <p>Upload file :</p>
                <input type="file" accept="application/pdf" name="file" required>
            </div>
            <div class="button">
                <input type="submit" value="Upload" class="upload" name="upload">
                <a href="index.php" class="cancel">Cancel</a>
            </div>
        </div>
    </form>
    </div>
</body>

</html>