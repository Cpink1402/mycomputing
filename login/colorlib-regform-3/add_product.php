<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Song</h2>
                    <form method="POST" enctype="multipart/form-data" >
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder=" Id" name="song_id">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="song_name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Describe" name="song_Describe">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Price" name="song_price">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Singer Name" name="singer_name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Genre Name" name="genre_name">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="lyric" name="song_lyric">
                        </div>
                        <div class="">
                          <input type="file" name="song_image" required="" style="color: white;">
                          <label style="color: white;">Image</label>
                        </div>
                        <br>
                        <div class="">
                          <input type="file" name="song_audio" required="" style="color: white;">
                          <label style="color: white;"> Audio </label>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="add_product">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
            $connect = mysqli_connect('localhost','root','','webmusic');
            if (isset($_POST['add_product'])) {
            $song_id =$_POST['song_id'];
            $song_name =$_POST['song_name'];
            $song_describe =$_POST['song_describe'];
            $song_price =$_POST['song_price'];
            $singer_name =$_POST['singer_name'];
            $genre_name =$_POST['genre_name'];
            $song_lyric =$_POST['song_lyric'];
            //lấy ảnh từ thư mục bất kỳ của máy tính
            $song_image =$_FILES['song_image']['name'];
            //di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp_name của htdocs
            $song_image_tmp =$_FILES['song_image']['tmp_name'];
            //đưa ảnh từ thư mục tmp sang thư mục cần lưu
            move_uploaded_file($song_image_tmp, "image/$song_image");
            //lấy audio từ thư mục bất kỳ của máy tính
            $song_audio =$_FILES['song_audio']['name'];
            //di chuyển audio từ thư mục bất kỳ sang thư mục tmp_name của htdocs
            $song_audio_tmp =$_FILES['song_audio']['tmp_name'];
            //đưa audio từ thư mục tmp sang thư mục cần lưu
            move_uploaded_file($song_audio_tmp, "audio/$song_audio");
            //thêm sản phẩm vào cơ sở dữ liệu
            $sql = "INSERT INTO song VALUES('$song_id','$song_name','$song_Describe','$song_price','$singer_name','$genre_name','$song_lyric','$song_image','$song_audio')";
            $result = mysqli_query($connect, $sql);
            if($result){
                echo "<script>alert('Added success song') </script>";
                echo "<script> window.location.href = '../../index1.php' </script>";
                }
            else{
                echo "<script>alert('Add new error') </script";
            }

            }
        ?>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->