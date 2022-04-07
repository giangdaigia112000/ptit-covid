<?php
        require './connectdb.php';
        require './islogin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Logo_PTIT.jpg/600px-Logo_PTIT.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>PTIT-Covid "Quản lý tiêm chủng"</title>
</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <a class="col-4 logopage" href="./index.php">
                <img class="logo" src="https://lh3.googleusercontent.com/zihc3UZKqe_wJpAbIeAMYgiDBPPcGg-DvUxmFLc-O9I4DKhR-kt-sTLA2kmLoqpejIE" alt="Logo_PTIT">
                <h1>Quản lý tiêm chủng PTIT</h1>
            </a>
            <div class="col-4 search ">
            </div>
            <div class="col-4 ">
            <?php 
                if(isset($_SESSION['username'])) echo $name."|".$_SESSION['username']. " <a href='./logout.php'>Đăng xuất </a> ";
                else {
                    echo "<a href='./login.php'>
                    <button class='btn btn-primary'>Đăng nhập</button> </a>";
                }
            ?>
            </div>
        </header>
        <div class="container">
            <div class="menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Thông tin tiêm chủng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(!isset($_SESSION['username'])) echo "disabled" ?>" href="./dangky.php">Đăng ký tiêm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(!isset($_SESSION['username'])) echo "disabled" ?>" href="./canhan.php">Cá nhân</a>
                    </li>
                </ul>
            </div>
            <?php
                $sqlbaiviet="SELECT * FROM `baiviet` WHERE 1";
                $querybaiviet = mysqli_query($connectdb,$sqlbaiviet);
                while($baiviet = mysqli_fetch_array($querybaiviet)){
                    $none="";
                    if(!isset($_SESSION['admin'])){$none="none";}
                    else {
                        if($_SESSION['admin']==0){$none="none";}
                        else $none="";
                    }
                    $idbaiviet=$baiviet['idbaiviet'];
                    echo "<div class='row img-rounded' style='padding: 20px; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;'>
                    <div class='col-5'>
                        <img src='{$baiviet['img']}' style='width:100%; border-radius: 10px;'>
                    </div>
                    <div class='col-7'>
                        <b style='font-size: 20px;'>{$baiviet['title']}</b>
                        <p style='font-size: 15px;'>{$baiviet['content']}</p>
                    </div>
                    <div class='text-center' style='width: 100%; display: {$none};'>
                    <a href='suabaiviet.php?id={$idbaiviet}'>Sửa</a>
                    </div>
                    </div>";
                }

            ?>    

        </div>
    </div>
    <footer>
        <div class="text-center ">
            <p>© Bản quyền thuộc HỌC VIỆN CÔNG NGHỆ BƯU CHÍNH VIỄN THÔNG, BAN PHÒNG CHỐNG DỊCH COVID-19</p>
        </div>
        <div class="d-flex justify-content-center ">
            <div>
                <P>Liên hiện: 012345678</P>
                <p>Email: PtitCovid@gmail.com</p>
                <p>Trụ sở chính: 122 Hoàng Quốc Việt, Q.Cầu Giấy, Hà Nội. </p>
            </div>
            <div>
                <img width="50 " src="./img/boyte.jpg " alt=" ">
                <img width="50 " src="./img/ptit.png " alt=" ">
            </div>
        </div>
    </footer>
</body>

</html>