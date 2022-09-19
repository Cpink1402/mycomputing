<?php
  session_start();
?>
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
    <?php 
    $connect = mysqli_connect('localhost','root','','webmusic');
    if(!$connect)
    {
      echo "connection failed";
    }
    $sql="SELECT * FROM song";
    //Tìm và trả về kết quả dưới dạng 1 mảng và lấy từng dòng dữ liệu
  ?>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    <form action="" method="post" >
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="User name" name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Password" name="password">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <?php
        if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
        {

            $username = $_POST['username']; //abc
            $password =$_POST['password']; //123
            //Lựa từ bảng user cột username = username nhập từ form và cột password = giá trị password nhập từ form

            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

            // Thực thi truy vấn từ csdl dùng hàm mysqli_query

            $result = mysqli_query($connect,$sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows==0)
            {
                ?>
                    <script>
                        alert("Username or password is incorrect");
                    </script>
                <?php
            }
            else
            {
                $user = mysqli_fetch_array($result);
                $user_id = $user['user_id'];
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_id;
                ?>
                    <script>
                        alert("Login success");
                        window.location.href = "../../index1.php";
                    </script>  
                <?php
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